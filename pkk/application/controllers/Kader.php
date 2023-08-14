<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kader extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        verify_session();
        verify_sekretaris_pkk();
        $this->load->model('Kader_model');
        $this->load->model('Anggota_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'kader_data' => $this->Kader_model->get_all(),
        );
        $this->template->load('template','kader/kader_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kader_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id_kader' => $row->id_kader,
				'id_anggota' => $row->id_anggota,
                'nama_anggota' => $this->Anggota_model->get_by_id($row->id_anggota)->nama_anggota,
                'nik' => $this->Anggota_model->get_by_id($row->id_anggota)->nik,
				'jabatan_kader' => $row->jabatan_kader,
				'keterangan' => $row->keterangan,
				'id_pengguna' => $row->id_pengguna,
				'status_kader' => $row->status_kader,
			);
            $this->template->load('template','kader/kader_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('kader'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('kader/create_action'),
			'id_kader' => set_value('id_kader'),
			'id_anggota' => set_value('id_anggota'),
            'nama_anggota' => set_value('nama_anggota'),
			'jabatan_kader' => set_value('jabatan_kader'),
			'keterangan' => set_value('keterangan'),
			'id_pengguna' => set_value('id_pengguna'),
			'status_kader' => set_value('status_kader'),
            'data_anggota' => $this->Anggota_model->get_all(),
		);
        $this->template->load('template','kader/kader_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'id_anggota' => $this->input->post('id_anggota',TRUE),
				'jabatan_kader' => $this->input->post('jabatan_kader',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
				'id_pengguna' => $this->session->userdata('id_pengguna'),
				'status_kader' => 'aktif',
			);

            $this->Kader_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil Tambah Data');
            redirect(site_url('kader'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kader_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('kader/update_action'),
				'id_kader' => set_value('id_kader', $row->id_kader),
				'id_anggota' => set_value('id_anggota', $row->id_anggota),
                'nama_anggota' => $this->Anggota_model->get_by_id($row->id_anggota)->nama_anggota,
				'jabatan_kader' => set_value('jabatan_kader', $row->jabatan_kader),
				'keterangan' => set_value('keterangan', $row->keterangan),
				'id_pengguna' => set_value('id_pengguna', $row->id_pengguna),
				'status_kader' => set_value('status_kader', $row->status_kader),
                'data_anggota' => $this->Anggota_model->get_all(),
			);
            $this->template->load('template','kader/kader_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('kader'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kader', TRUE));
        } else {
            $data = array(
				'id_anggota' => $this->input->post('id_anggota',TRUE),
				'jabatan_kader' => $this->input->post('jabatan_kader',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
				'id_pengguna' => $this->session->userdata('id_pengguna'),
			);

            $this->Kader_model->update($this->input->post('id_kader', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil Edit Data');
            redirect(site_url('kader'));
        }
    }
    
    public function nonaktif($id) 
    {
        $row = $this->Kader_model->get_by_id($id);

        if ($row) {
            $this->Kader_model->nonaktif($id);
            $this->session->set_flashdata('message', 'Berhasil Nonaktifkan Data');
            redirect(site_url('kader'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('kader'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('id_anggota', 'id anggota', 'trim|required');
		$this->form_validation->set_rules('jabatan_kader', 'jabatan kader', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

		$this->form_validation->set_rules('id_kader', 'id_kader', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kader.php */
/* Location: ./application/controllers/Kader.php */
/* Please DO NOT modify this information : */
/* Generated by CRUDV2 Generator For AdminLTE Template 2019-06-03 08:11:00 */
