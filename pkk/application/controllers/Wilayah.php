<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        verify_session();
        verify_sekretaris_pkk();
        $this->load->model('Wilayah_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'wilayah_data' => $this->Wilayah_model->get_all(),
        );
        $this->template->load('template','wilayah/wilayah_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Wilayah_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id_wilayah' => $row->id_wilayah,
				'nama_wilayah' => $row->nama_wilayah,
				'alamat_wilayah' => $row->alamat_wilayah,
			);
            $this->template->load('template','wilayah/wilayah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('wilayah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('wilayah/create_action'),
			'id_wilayah' => set_value('id_wilayah'),
			'nama_wilayah' => set_value('nama_wilayah'),
			'alamat_wilayah' => set_value('alamat_wilayah'),
		);
        $this->template->load('template','wilayah/wilayah_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'nama_wilayah' => $this->input->post('nama_wilayah',TRUE),
				'alamat_wilayah' => $this->input->post('alamat_wilayah',TRUE),
			);

            $this->Wilayah_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil Tambah Data');
            redirect(site_url('wilayah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Wilayah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('wilayah/update_action'),
				'id_wilayah' => set_value('id_wilayah', $row->id_wilayah),
				'nama_wilayah' => set_value('nama_wilayah', $row->nama_wilayah),
				'alamat_wilayah' => set_value('alamat_wilayah', $row->alamat_wilayah),
			);
            $this->template->load('template','wilayah/wilayah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('wilayah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_wilayah', TRUE));
        } else {
            $data = array(
				'nama_wilayah' => $this->input->post('nama_wilayah',TRUE),
				'alamat_wilayah' => $this->input->post('alamat_wilayah',TRUE),
			);

            $this->Wilayah_model->update($this->input->post('id_wilayah', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil Edit Data');
            redirect(site_url('wilayah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Wilayah_model->get_by_id($id);

        if ($row) {
            $this->Wilayah_model->delete($id);
            $this->session->set_flashdata('message', 'Berhasil Hapus Data');
            redirect(site_url('wilayah'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('wilayah'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('nama_wilayah', 'nama wilayah', 'trim|required');
		$this->form_validation->set_rules('alamat_wilayah', 'alamat wilayah', 'trim|required');

		$this->form_validation->set_rules('id_wilayah', 'id_wilayah', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
