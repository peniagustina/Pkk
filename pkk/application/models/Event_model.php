<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model
{

    public $table = 'event';
    public $id = 'id_event';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->where('status_event', 'aktif');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_event_by_tanggal($tanggal_awal, $tanggal_akhir)
    {
        $this->db->where("tanggal >= '$tanggal_awal' AND tanggal <= '$tanggal_akhir'");
        $this->db->order_by('tanggal', 'asc');
        return $this->db->get('event')->result();
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
        $this->db->update('event', array('status_event' => 'nonaktif'));
    }

}
