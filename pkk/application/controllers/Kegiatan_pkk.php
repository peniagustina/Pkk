<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_pkk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        verify_session();
        verify_dasawisma();
        $this->load->model('Kegiatan_pkk_model');
        $this->load->model('Detail_keluarga_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'kegiatan_pkk_data' => $this->Kegiatan_pkk_model->get_all(),
        );
        $this->template->load('template','kegiatan_pkk/kegiatan_pkk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kegiatan_pkk_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id_kegiatan_pkk' => $row->id_kegiatan_pkk,
				'nama_kegiatan' => $row->nama_kegiatan,
				'tempat_kegiatan' => $row->tempat_kegiatan,
				'tanggal_kegiatan' => $row->tanggal_kegiatan,
				'keterangan' => $row->keterangan,
                'data_kegiatan_keluarga' => $this->Kegiatan_pkk_model->get_data_kegiatan_keluarga($row->id_kegiatan_pkk),
			);
            $this->template->load('template','kegiatan_pkk/kegiatan_pkk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('kegiatan_pkk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('kegiatan_pkk/create_action'),
			'id_kegiatan_pkk' => set_value('id_kegiatan_pkk'),
			'nama_kegiatan' => set_value('nama_kegiatan'),
			'tempat_kegiatan' => set_value('tempat_kegiatan'),
			'tanggal_kegiatan' => set_value('tanggal_kegiatan'),
			'keterangan' => set_value('keterangan'),
		);
        $this->template->load('template','kegiatan_pkk/kegiatan_pkk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'nama_kegiatan' => $this->input->post('nama_kegiatan',TRUE),
				'tempat_kegiatan' => $this->input->post('tempat_kegiatan',TRUE),
				'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
			);

            $this->Kegiatan_pkk_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil Tambah Data');
            redirect(site_url('kegiatan_pkk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kegiatan_pkk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('kegiatan_pkk/update_action'),
				'id_kegiatan_pkk' => set_value('id_kegiatan_pkk', $row->id_kegiatan_pkk),
				'nama_kegiatan' => set_value('nama_kegiatan', $row->nama_kegiatan),
				'tempat_kegiatan' => set_value('tempat_kegiatan', $row->tempat_kegiatan),
				'tanggal_kegiatan' => set_value('tanggal_kegiatan', $row->tanggal_kegiatan),
				'keterangan' => set_value('keterangan', $row->keterangan),
			);
            $this->template->load('template','kegiatan_pkk/kegiatan_pkk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('kegiatan_pkk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kegiatan_pkk', TRUE));
        } else {
            $data = array(
				'nama_kegiatan' => $this->input->post('nama_kegiatan',TRUE),
				'tempat_kegiatan' => $this->input->post('tempat_kegiatan',TRUE),
				'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
			);

            $this->Kegiatan_pkk_model->update($this->input->post('id_kegiatan_pkk', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil Edit Data');
            redirect(site_url('kegiatan_pkk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kegiatan_pkk_model->get_by_id($id);

        if ($row) {
            $this->Kegiatan_pkk_model->delete($id);
            $this->session->set_flashdata('message', 'Berhasil Hapus Data');
            redirect(site_url('kegiatan_pkk'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('kegiatan_pkk'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('nama_kegiatan', 'nama kegiatan', 'trim|required');
		$this->form_validation->set_rules('tempat_kegiatan', 'tempat kegiatan', 'trim|required');
		$this->form_validation->set_rules('tanggal_kegiatan', 'tanggal kegiatan', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

		$this->form_validation->set_rules('id_kegiatan_pkk', 'id_kegiatan_pkk', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    ///////////////////////////////////////////////////////////////////////////////

    public function create_peserta($id_kegiatan_pkk)
    {
        $row = $this->Kegiatan_pkk_model->get_by_id($id_kegiatan_pkk);
        if ($row) {
            $data = array(
                'button' => 'Tambah',
                'action' => site_url('kegiatan_pkk/create_peserta_action'),
                'id_kegiatan_keluarga' => set_value('id_kegiatan_keluarga'),
                'id_kegiatan_pkk' => $row->id_kegiatan_pkk,
                'nama_kegiatan' => $row->nama_kegiatan,
                'tempat_kegiatan' => $row->tempat_kegiatan,
                'tanggal_kegiatan' => $row->tanggal_kegiatan,
                'keterangan' => $row->keterangan,
                'id_detail_kk' => set_value('id_detail_kk'),
                'nama' => set_value('nama'),
                'detail_kk' => $this->Kegiatan_pkk_model->get_detail_kk($row->id_kegiatan_pkk),
            );
            $this->template->load('template','kegiatan_pkk/kegiatan_pkk_peserta_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('kegiatan_pkk'));
        }
    }

    public function create_peserta_action()
    {
        $data = array(
            'id_kegiatan_pkk' => $this->input->post('id_kegiatan_pkk',TRUE),
            'id_detail_kk' => $this->input->post('id_detail_kk',TRUE),
        );
        $this->Kegiatan_pkk_model->insert_kegiatan_keluarga($data);
        $this->session->set_flashdata('message', 'Berhasil Tambah Data');
        redirect(site_url('kegiatan_pkk/read/'.$this->input->post('id_kegiatan_pkk', TRUE)));
    }

    public function update_peserta($id_kegiatan_keluarga)
    {
        $row = $this->Kegiatan_pkk_model->get_kegiatan_keluarga_by_id($id_kegiatan_keluarga);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('kegiatan_pkk/update_peserta_action'),
                'id_kegiatan_keluarga' => set_value('id_kegiatan_keluarga', $row->id_kegiatan_keluarga),
                'id_kegiatan_pkk' => set_value('id_kegiatan_pkk', $row->id_kegiatan_pkk),
                'id_detail_kk' => set_value('id_detail_kk', $row->id_detail_kk),
                'nama_kegiatan' => $this->Kegiatan_pkk_model->get_by_id($row->id_kegiatan_pkk)->nama_kegiatan,
                'tempat_kegiatan' => $this->Kegiatan_pkk_model->get_by_id($row->id_kegiatan_pkk)->tempat_kegiatan,
                'tanggal_kegiatan' => $this->Kegiatan_pkk_model->get_by_id($row->id_kegiatan_pkk)->tanggal_kegiatan,
                'keterangan' => $this->Kegiatan_pkk_model->get_by_id($row->id_kegiatan_pkk)->keterangan,
                'nama' => $this->Detail_keluarga_model->get_by_id($row->id_detail_kk)->nama,
                'detail_kk' => $this->Kegiatan_pkk_model->get_detail_kk($row->id_kegiatan_pkk),
            );
            $this->template->load('template','kegiatan_pkk/kegiatan_pkk_peserta_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('kegiatan_pkk'));
        }
    }

    public function update_peserta_action()
    {
        $data = array(
            'id_detail_kk' => $this->input->post('id_detail_kk',TRUE),
        );
        $this->Kegiatan_pkk_model->update_kegiatan_keluarga($this->input->post('id_kegiatan_keluarga', TRUE), $data);
        $this->session->set_flashdata('message', 'Berhasil Ubah Data');
        redirect(site_url('kegiatan_pkk/read/'.$this->input->post('id_kegiatan_pkk', TRUE)));
    }

    public function delete_peserta($id_kegiatan_keluarga)
    {
        $row = $this->Kegiatan_pkk_model->get_kegiatan_keluarga_by_id($id_kegiatan_keluarga);
        if ($row) {
            $this->Kegiatan_pkk_model->delete_kegiatan_keluarga($id_kegiatan_keluarga);
            $this->session->set_flashdata('message', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('kegiatan_pkk'));
        }
    }

}