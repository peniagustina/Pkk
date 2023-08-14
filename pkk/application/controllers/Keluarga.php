<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		verify_session();
        verify_dasawisma();
		$this->load->model('Keluarga_model');
		$this->load->model('Wilayah_model');
		$this->load->library('form_validation');
		$this->load->library('datatables');
	}

	public function index()
	{
		$data = array(
			'keluarga_data' => $this->Keluarga_model->get_all(),
		);
		$this->template->load('template','keluarga/keluarga_list', $data);
	}

	public function kegiatan_keluarga($id)
	{
		$no_kk = $this->db->query("select no_kk from detail_keluarga where nik='$id'")->row()->no_kk;
		//echo "select no_kk from detail_keluarga where nik='$id'";
		$data = array(
			'kegiatan_keluarga_data' => $this->db->query("select * from kegiatan_keluarga where nik='$id'")->result(),
			'no_kk' => $no_kk,
			'nik' =>$id,
		);
		$this->template->load('template','kegiatan_keluarga/kegiatan_keluarga_list', $data);
	}


	// ini apa yang mau di rubah
	public function create() 
	{
		$data = array(
			'button' => 'Tambah Anggota Keluarga',
			'action' => site_url('keluarga/create_action'),
			'no_kk' => set_value('no_kk'),
			'keterangan' => set_value('keterangan'),
			'id_wilayah' => set_value('id_wilayah'),
			'wilayah' => $this->Wilayah_model->get_all(),
		);

		$this->template->load('template','keluarga/keluarga_form', $data);
	}

	public function create_action() 
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			if ($this->Keluarga_model->cek_nokk($this->input->post('no_kk')) == TRUE) {
				$this->session->set_flashdata('message', 'Nomor KK Sudah Terdaftar');
				redirect(site_url('keluarga'));
			} else {
				$data = array(
					'no_kk' => $this->input->post('no_kk',TRUE),
					'keterangan' => $this->input->post('keterangan',TRUE),
					'id_wilayah' => $this->input->post('id_wilayah',TRUE),
					'id_pengguna' => $this->session->userdata('id_pengguna'),
					'tanggal' => date('Y-m-d'),
					'status_keluarga' => 'aktif',
				);
				$this->Keluarga_model->insert($data);
				$this->session->set_flashdata('message', 'Berhasil Tambah Data');
				$no_kk = $this->input->post('no_kk');
				// jadi kan ini dia minta no_kk cuma di model itu ke panggil $id seharusnya itu pake $no_kk
				redirect(site_url('keluarga/read/'.$no_kk));
			}
		}
	}
// kalau disini enak mba ngodingnya kalau ada yang kurang itu keliatan errornya
// ntar tunggu aja semua extensi nya kedownload 
// sama kalau disini bisa auto save jadi gak perlu lagu ctrl + s
	public function read($no_kk)
	{
		$row = $this->Keluarga_model->get_by_id($no_kk);
		if ($row) {
			$data = array(
				'button' => 'Simpan',
				'action' => site_url('keluarga/create_detail_keluarga_action'),
				'no_kk' => $row->no_kk,
				'keterangan' => $row->keterangan,
				'id_wilayah' => $row->id_wilayah,
				'nama_wilayah' => $this->Wilayah_model->get_by_id($row->id_wilayah)->nama_wilayah,
				'detail_kk' => $this->Keluarga_model->get_detail_kelurga($no_kk),
			);
			$this->template->load('template','keluarga/keluarga_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(site_url('keluarga'));
		}
	}

	public function update($id) 
	{
		$row = $this->Keluarga_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Ubah',
				'action' => site_url('keluarga/update_action'),
				'no_kk' => set_value('no_kk', $row->no_kk),
				'keterangan' => set_value('keterangan', $row->keterangan),
				'id_wilayah' => set_value('id_wilayah', $row->id_wilayah),
				'wilayah' => $this->Wilayah_model->get_all(),
			);
			$this->template->load('template','keluarga/keluarga_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(site_url('keluarga'));
		}
	}

	public function update_action() 
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('no_kk', TRUE));
		} else {
			$data = array(
				'keterangan' => $this->input->post('keterangan',TRUE),
				'id_wilayah' => $this->input->post('id_wilayah',TRUE),
			);

			$this->Keluarga_model->update($this->input->post('no_kk', TRUE), $data);
			$this->session->set_flashdata('message', 'Berhasil Edit Data');
			redirect(site_url('keluarga'));
		}
	}

	public function nonaktif($id) 
	{
		$row = $this->Keluarga_model->get_by_id($id);

		if ($row) {
			$this->Keluarga_model->nonaktif($id);
			$this->session->set_flashdata('message', 'Berhasil Nonaktifkan Data');
			redirect(site_url('keluarga'));
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(site_url('keluarga'));
		}
	}

	public function _rules() 
	{
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		$this->form_validation->set_rules('id_wilayah', 'id wilayah', 'trim|required');

		$this->form_validation->set_rules('no_kk', 'no_kk', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

}