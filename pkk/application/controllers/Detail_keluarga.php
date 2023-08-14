<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_keluarga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        verify_session();
        verify_dasawisma();
        $this->load->model('Detail_keluarga_model');
        $this->load->model('Keluarga_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
    }

    public function index()
    {
        redirect('dashboard');
    }

    public function create($no_kk) 
    {
    	$row = $this->Keluarga_model->get_by_id($no_kk);
        if ($row) {
	        $data = array(
	            'button' => 'Tambah',
	            'action' => site_url('detail_keluarga/create_action'),
				'id_detail_kk' => set_value('id_detail_kk'),
				'no_kk' => $row->no_kk,
				'nik' => set_value('nik'),
				'nama' => set_value('nama'),
				'status' => set_value('status'),
				'jenis_kelamin' => set_value('jenis_kelamin'),
				'tempat_lahir' => set_value('tempat_lahir'),
				'tanggal_lahir' => set_value('tanggal_lahir'),
				'agama' => set_value('agama'),
				'pendidikan' => set_value('pendidikan'),
				'pekerjaan' => set_value('pekerjaan'),
				'kedudukan' => set_value('kedudukan'),
				'status_keluarga' => set_value('status_keluarga'),
			);
	        $this->template->load('template','detail_keluarga/detail_keluarga_form', $data);
	    } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('keluarga'));
        }
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create($this->input->post('no_kk'));
        } else {
        	$cek_nik = $this->Detail_keluarga_model->cek_nik($this->input->post('nik', TRUE));
        	if ($cek_nik) {
        		$this->session->set_flashdata('message', 'NIK Sudah Terdaftar');
                redirect(site_url('detail_keluarga/create/'.$this->input->post('no_kk', TRUE)));
        	} else {
        		$data = array(
					'no_kk' => $this->input->post('no_kk',TRUE),
					'nik' => $this->input->post('nik',TRUE),
					'nama' => $this->input->post('nama',TRUE),
					'status' => $this->input->post('status',TRUE),
					'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
					'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
					'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
					'agama' => $this->input->post('agama',TRUE),
					'pendidikan' => $this->input->post('pendidikan',TRUE),
					'pekerjaan' => $this->input->post('pekerjaan',TRUE),
					'kedudukan' => $this->input->post('kedudukan',TRUE),
					'status_keluarga' => 'aktif',
				);
	            $this->Detail_keluarga_model->insert($data);
	            $this->session->set_flashdata('message', 'Berhasil Tambah Data');
	            redirect(site_url('keluarga/read/'.$this->input->post('no_kk')));
        	}
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_keluarga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('detail_keluarga/update_action'),
				'id_detail_kk' => set_value('id_detail_kk', $row->id_detail_kk),
				'no_kk' => set_value('no_kk', $row->no_kk),
				'nik' => set_value('nik', $row->nik),
				'nama' => set_value('nama', $row->nama),
				'status' => set_value('status', $row->status),
				'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
				'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
				'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
				'agama' => set_value('agama', $row->agama),
				'pendidikan' => set_value('pendidikan', $row->pendidikan),
				'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
				'kedudukan' => set_value('kedudukan', $row->kedudukan),
				'status_keluarga' => set_value('status_keluarga', $row->status_keluarga),
			);
            $this->template->load('template','detail_keluarga/detail_keluarga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('detail_keluarga'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_detail_kk', TRUE));
        } else {
        	$nik_old = $this->input->post('nik_old', TRUE);
        	$cek_nik = $this->Detail_keluarga_model->cek_nik($this->input->post('nik', TRUE));

        	if ($cek_nik->nik == $nik_old) {
        		$data = array(
					'nama' => $this->input->post('nama',TRUE),
					'status' => $this->input->post('status',TRUE),
					'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
					'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
					'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
					'agama' => $this->input->post('agama',TRUE),
					'pendidikan' => $this->input->post('pendidikan',TRUE),
					'pekerjaan' => $this->input->post('pekerjaan',TRUE),
					'kedudukan' => $this->input->post('kedudukan',TRUE),
				);

	            $this->Detail_keluarga_model->update($this->input->post('id_detail_kk', TRUE), $data);
	            $this->session->set_flashdata('message', 'Berhasil Edit Data');
	            redirect(site_url('keluarga/read/'.$this->input->post('no_kk')));
        	} else if ($cek_nik && $cek_nik->nik != $nik_old) {
        		$this->session->set_flashdata('message', 'NIK Sudah Terdaftar');
                redirect(site_url('detail_keluarga/update/'.$this->input->post('id_detail_kk', TRUE)));
        	} else {
        		$data = array(
					'nik' => $this->input->post('nik',TRUE),
					'nama' => $this->input->post('nama',TRUE),
					'status' => $this->input->post('status',TRUE),
					'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
					'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
					'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
					'agama' => $this->input->post('agama',TRUE),
					'pendidikan' => $this->input->post('pendidikan',TRUE),
					'pekerjaan' => $this->input->post('pekerjaan',TRUE),
					'kedudukan' => $this->input->post('kedudukan',TRUE),
				);
	            $this->Detail_keluarga_model->update($this->input->post('id_detail_kk', TRUE), $data);
	            $this->session->set_flashdata('message', 'Berhasil Edit Data');
	            redirect(site_url('keluarga/read/'.$this->input->post('no_kk')));
        	}
        }
    }
    
    public function nonaktif($id) 
    {
        $row = $this->Detail_keluarga_model->get_by_id($id);

        if ($row) {
            $this->Detail_keluarga_model->nonaktif($id);
            $this->session->set_flashdata('message', 'Berhasil Nonaktifkan Data');
            redirect(site_url('keluarga/read/'.$id));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('keluarga'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
		$this->form_validation->set_rules('nik', 'nik', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
		$this->form_validation->set_rules('agama', 'agama', 'trim|required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
		$this->form_validation->set_rules('kedudukan', 'kedudukan', 'trim|required');

		$this->form_validation->set_rules('id_detail_kk', 'id_detail_kk', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}