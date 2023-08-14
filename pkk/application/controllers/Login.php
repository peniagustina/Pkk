<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Login_model');
	}

	public function index()
	{
		$data= array(
			'meta_title' 		=> 'Sistem Informasi PKK',
			'meta_description' 	=> 'Sistem Informasi PKK',
			'meta_url' 			=> 'Sistem Informasi PKK',
			'nama_instansi' 	=> 'PKK Desa Bunton',
			'meta_images'      	=> base_url('assets/images/images.jpg'),
		);
		$this->load->view('login',$data);
	}

	public function aksi_login()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$username = $this->input->post('username', TRUE);
			$password = md5($this->input->post('password', TRUE));

			$row = $this->Login_model->cek_login($username);

			if ($row->username == $username && $row->password != NULL) {
				$hash = $row->password;
				if (password_verify($password, $row->password)) {
					$data = array(
						'id_pengguna' => $row->id_pengguna,
						'id_anggota' => $row->id_anggota,
						'nik_anggota' => $row->nik,
					    'nama_anggota' => $row->nama_anggota,
					    'jabatan_anggota' => $row->jabatan_anggota,
					    'username' => $row->username,
					    'password' => $row->password,
					    'hak_akses' => $row->hak_akses,
					    'status' => "login_pkk", 
					);
					$this->session->set_userdata($data);
					redirect(site_url('dashboard'));
				} else {
					$this->session->set_userdata('pesan', 'Password Salah');
					redirect(site_url('login'));
				}
			} else {
				$this->session->set_userdata('pesan', 'Username tidak terdaftar');
				redirect(site_url('login'));
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
        redirect(site_url('login'));
	}

	public function _rules()
	{
    	$this->form_validation->set_rules('username', 'password', 'trim|required');
    	$this->form_validation->set_rules('password', 'password', 'trim|required');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

}
