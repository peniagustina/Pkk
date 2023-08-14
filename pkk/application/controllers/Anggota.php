O<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        verify_session();
        verify_dasawisma();
        $this->load->model('Anggota_model');
        $this->load->model('Wilayah_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'anggota_data' => $this->Anggota_model->get_all(),
        );
        $this->template->load('template','anggota/anggota_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id_anggota' => $row->id_anggota,
				'nik' => $row->nik,
				'nama_anggota' => $row->nama_anggota,
				'jabatan_anggota' => $row->jabatan_anggota,
				'jenis_kelamin' => $row->jenis_kelamin,
				'tempat_lahir' => $row->tempat_lahir,
				'tanggal_lahir' => $row->tanggal_lahir,
				'status' => $row->status,
				'alamat' => $row->alamat,
				'pendidikan' => $row->pendidikan,
				'pekerjaan' => $row->pekerjaan,
				'keterangan' => $row->keterangan,
				'id_wilayah' => $row->id_wilayah,
                'nama_wilayah' => $this->Wilayah_model->get_by_id($row->id_wilayah)->nama_wilayah,
			);
            $this->template->load('template','anggota/anggota_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('anggota'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('anggota/create_action'),
			'id_anggota' => set_value('id_anggota'),
			'nik' => set_value('nik'),
			'nama_anggota' => set_value('nama_anggota'),
			'jabatan_anggota' => set_value('jabatan_anggota'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'tempat_lahir' => set_value('tempat_lahir'),
			'tanggal_lahir' => set_value('tanggal_lahir'),
			'status' => set_value('status'),
			'alamat' => set_value('alamat'),
			'pendidikan' => set_value('pendidikan'),
			'pekerjaan' => set_value('pekerjaan'),
			'keterangan' => set_value('keterangan'),
			'id_wilayah' => set_value('id_wilayah'),
			'wilayah' => $this->Wilayah_model->get_all(),
		);
        $this->template->load('template','anggota/anggota_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'nik' => $this->input->post('nik',TRUE),
				'nama_anggota' => $this->input->post('nama_anggota',TRUE),
				'jabatan_anggota' => $this->input->post('jabatan_anggota',TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
				'status' => $this->input->post('status',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'pendidikan' => $this->input->post('pendidikan',TRUE),
				'pekerjaan' => $this->input->post('pekerjaan',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
				'id_wilayah' => $this->input->post('id_wilayah',TRUE),
                'id_pengguna' => $this->session->userdata('id_pengguna'),
                'status_anggota' => 'aktif',
			);

            $this->Anggota_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil Tambah Data');
            redirect(site_url('anggota'));
	        
        }
    }
    
    public function update($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('anggota/update_action'),
				'id_anggota' => set_value('id_anggota', $row->id_anggota),
				'nik' => set_value('nik', $row->nik),
				'nama_anggota' => set_value('nama_anggota', $row->nama_anggota),
				'jabatan_anggota' => set_value('jabatan_anggota', $row->jabatan_anggota),
				'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
				'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
				'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
				'status' => set_value('status', $row->status),
				'alamat' => set_value('alamat', $row->alamat),
				'pendidikan' => set_value('pendidikan', $row->pendidikan),
				'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
				'keterangan' => set_value('keterangan', $row->keterangan),
				'id_wilayah' => set_value('id_wilayah', $row->id_wilayah),
                'wilayah' => $this->Wilayah_model->get_all(),
			);
            $this->template->load('template','anggota/anggota_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('anggota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_anggota', TRUE));
        } else {
            $data = array(
				'nik' => $this->input->post('nik',TRUE),
				'nama_anggota' => $this->input->post('nama_anggota',TRUE),
				'jabatan_anggota' => $this->input->post('jabatan_anggota',TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
				'status' => $this->input->post('status',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'pendidikan' => $this->input->post('pendidikan',TRUE),
				'pekerjaan' => $this->input->post('pekerjaan',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
				'id_wilayah' => $this->input->post('id_wilayah',TRUE),
			);

            $this->Anggota_model->update($this->input->post('id_anggota', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil Edit Data');
            redirect(site_url('anggota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $this->Anggota_model->delete($id);
            $this->session->set_flashdata('message', 'Berhasil Hapus Data');
            redirect(site_url('anggota'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('anggota'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('nik', 'nik', 'trim|required');
		$this->form_validation->set_rules('nama_anggota', 'nama anggota', 'trim|required');
		$this->form_validation->set_rules('jabatan_anggota', 'jabatan anggota', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		$this->form_validation->set_rules('id_wilayah', 'id wilayah', 'trim|required');
		$this->form_validation->set_rules('foto', 'foto', 'trim');
		$this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */
/* Please DO NOT modify this information : */
/* Generated by CRUDV2 Generator For AdminLTE Template 2018-12-18 05:04:18 */