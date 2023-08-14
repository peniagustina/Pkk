<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function cek_login($username)
	{
		$this->db->select('a.*, b.nik, b.id_anggota, b.nama_anggota, b.jabatan_anggota');
        $this->db->from('pengguna a');
        $this->db->join('anggota b', 'a.id_anggota = b.id_anggota');
		$this->db->where('a.username', $username);
        return $this->db->get()->row();
	}

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */