<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function count_event()
	{
		$this->db->where('status_event', 'aktif');
		return $this->db->get('event')->num_rows();
	}

	public function count_keluarga()
	{
		$this->db->where('status_keluarga', 'aktif');
		return $this->db->get('keluarga')->num_rows();
	}

	public function count_anggota_pkk()
	{
		$this->db->where('status_anggota', 'aktif');
		return $this->db->get('anggota')->num_rows();
	}

	public function count_kegiatan_pkk()
	{
		return $this->db->get('kegiatan_pkk')->num_rows();
	}

	public function count_pengguna()
	{
		$this->db->where('status_pengguna', 'aktif');
		return $this->db->get('pengguna')->num_rows();
	}

	public function count_kader()
	{
		$this->db->where('status_kader', 'aktif');
		return $this->db->get('kader')->num_rows();
	}

	public function count_wilayah()
	{
		return $this->db->get('wilayah')->num_rows();
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */