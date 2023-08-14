<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        verify_session();
        verify_sekretaris_pkk();
        $this->load->model('Pengguna_model');
        $this->load->model('Anggota_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'pengguna_data' => $this->Pengguna_model->get_all(),
        );
        $this->template->load('template','pengguna/pengguna_list', $data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('pengguna/create_action'),
			'id_pengguna' => set_value('id_pengguna'),
			'id_anggota' => set_value('id_anggota'),
            'nama_anggota' => set_value('nama_anggota'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'hak_akses' => set_value('hak_akses'),
			'status_pengguna' => set_value('status_pengguna'),
            'data_anggota' => $this->Anggota_model->get_all(),
		);
        $this->template->load('template','pengguna/pengguna_form_create', $data);
    }
    
    public function create_action() 
    {
        $this->rules_create();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $cek_username = $this->Pengguna_model->cek_username($this->input->post('username', TRUE));
            if ($cek_username) {
                $this->session->set_flashdata('message', 'Username Sudah Terdaftar, Silakan Gunakan Username Lain');
                redirect(site_url('pengguna/create'));
            } else {
                $data = array(
    				'id_anggota' => $this->input->post('id_anggota',TRUE),
    				'username' => $this->input->post('username',TRUE),
    				'password' => password_hash(md5($this->input->post('password_ulang',TRUE)), PASSWORD_BCRYPT),
    				'hak_akses' => $this->input->post('hak_akses',TRUE),
    				'status_pengguna' => 'aktif',
    			);

                $this->Pengguna_model->insert($data);
                $this->session->set_flashdata('message', 'Berhasil Tambah Data');
                redirect(site_url('pengguna'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pengguna_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('pengguna/update_action'),
                'action2' => site_url('pengguna/update_password_action'),
				'id_pengguna' => set_value('id_pengguna', $row->id_pengguna),
				'id_anggota' => set_value('id_anggota', $row->id_anggota),
                'nama_anggota' => $this->Anggota_model->get_by_id($row->id_anggota)->nama_anggota,
				'username' => set_value('username', $row->username),
				'password' => set_value('password', $row->password),
				'hak_akses' => set_value('hak_akses', $row->hak_akses),
				'status_pengguna' => set_value('status_pengguna', $row->status_pengguna),
                'data_anggota' => $this->Anggota_model->get_all(),
			);
            $this->template->load('template','pengguna/pengguna_form_update', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('pengguna'));
        }
    }
    
    public function update_action() 
    {
        $this->rules_update();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengguna', TRUE));
        } else {
            $username_old = $this->input->post('username_old', TRUE);
            $cek_username = $this->Pengguna_model->cek_username($this->input->post('username', TRUE));

            if ($cek_username->username == $username_old) {
                $data = array(
                    'id_anggota' => $this->input->post('id_anggota',TRUE),
                    'hak_akses' => $this->input->post('hak_akses',TRUE),
                );
                $this->Pengguna_model->update($this->input->post('id_pengguna', TRUE), $data);
                $this->session->set_flashdata('message', 'Berhasil Edit Data');
                redirect(site_url('pengguna'));
            } else if ($cek_username && $cek_username->username != $username_old) {
                $this->session->set_flashdata('message', 'Username Sudah Terdaftar, Silakan Gunakan Username Lain');
                redirect(site_url('pengguna/update/'.$this->input->post('id_pengguna',TRUE)));
            } else {
                 $data = array(
                    'id_anggota' => $this->input->post('id_anggota',TRUE),
                    'username' => $this->input->post('username',TRUE),
                    'hak_akses' => $this->input->post('hak_akses',TRUE),
                );
                $this->Pengguna_model->update($this->input->post('id_pengguna', TRUE), $data);
                $this->session->set_flashdata('message', 'Berhasil Edit Data');
                redirect(site_url('pengguna'));
            }
        }
    }

    public function update_password_action()
    {
        $data = array(
            'password' => password_hash(md5($this->input->post('password_ulang',TRUE)), PASSWORD_BCRYPT),
        );
        $this->Pengguna_model->update($this->input->post('id_pengguna', TRUE), $data);
        $this->session->set_flashdata('message', 'Berhasil Edit Password');
        redirect(site_url('pengguna'));
    }
    
    public function nonaktif($id) 
    {
        $row = $this->Pengguna_model->get_by_id($id);

        if ($row) {
            $this->Pengguna_model->nonaktif($id);
            $this->session->set_flashdata('message', 'Berhasil Hapus Data');
            redirect(site_url('pengguna'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('pengguna'));
        }
    }

    public function rules_create() 
    {
		$this->form_validation->set_rules('id_anggota', 'id anggota', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('hak_akses', 'hak akses', 'trim|required');

		$this->form_validation->set_rules('id_pengguna', 'id_pengguna', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function rules_update() 
    {
        $this->form_validation->set_rules('id_anggota', 'id anggota', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('hak_akses', 'hak akses', 'trim|required');

        $this->form_validation->set_rules('id_pengguna', 'id_pengguna', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}