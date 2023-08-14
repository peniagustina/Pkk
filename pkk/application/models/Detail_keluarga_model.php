<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_keluarga_model extends CI_Model
{

    public $table = 'detail_keluarga';
    public $id = 'id_detail_kk';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function cek_nik($nik)
    {
        $this->db->where('nik', $nik);
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
        $this->db->update('detail_keluarga', array('status_keluarga' => 'nonaktif'));
    }

}