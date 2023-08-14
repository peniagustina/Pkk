<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{

    public $table = 'pengguna';
    public $id = 'id_pengguna';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('a.*, b.nik, b.nama_anggota, b.jabatan_anggota');
        $this->db->from('pengguna a');
        $this->db->join('anggota b', 'a.id_anggota = b.id_anggota');
        $this->db->where('a.status_pengguna', 'aktif');
        $this->db->order_by('a.id_pengguna', 'DESC');
        return $this->db->get()->result();
    }

    function cek_username($username)
    {
        $this->db->where('username', $username);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function nonaktif($id)
    {
        $this->db->where($this->id, $id);
        $this->db->update('pengguna', array('status_pengguna' => 'nonaktif'));
    }

}