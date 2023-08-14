<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_pkk_model extends CI_Model
{

    public $table = 'kegiatan_pkk';
    public $id = 'id_kegiatan_pkk';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function get_kegiatan_keluarga_by_id($id)
    {
        $this->db->where('id_kegiatan_keluarga', $id);
        return $this->db->get('kegiatan_keluarga')->row();
    }

    function get_detail_kk($id_kegiatan_pkk)
    {
        $this->db->select('*');
        $this->db->from('detail_keluarga');
        $this->db->where("id_detail_kk NOT IN (select id_detail_kk from kegiatan_keluarga where id_kegiatan_pkk = '$id_kegiatan_pkk')");
        return $this->db->get()->result();
    }

    function get_data_kegiatan_keluarga($id_kegiatan_pkk)
    {
        $this->db->select('a.*,b.*');
        $this->db->from('kegiatan_keluarga a');
        $this->db->join('detail_keluarga b', 'a.id_detail_kk = b.id_detail_kk');
        $this->db->where('a.id_kegiatan_pkk', $id_kegiatan_pkk);
        return $this->db->get()->result();
    }

    function get_laporan_by_tanggal($tanggal_awal, $tanggal_akhir)
    {
        $this->db->where("tanggal_kegiatan >= '$tanggal_awal' AND tanggal_kegiatan <= '$tanggal_akhir'");
        $this->db->order_by('tanggal_kegiatan', 'asc');
        return $this->db->get('kegiatan_pkk')->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // insert data
    function insert_kegiatan_keluarga($data)
    {
        $this->db->insert('kegiatan_keluarga', $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function update_kegiatan_keluarga($id, $data)
    {
        $this->db->where('id_kegiatan_keluarga', $id);
        $this->db->update('kegiatan_keluarga', $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function delete_kegiatan_keluarga($id_kegiatan_keluarga)
    {
        $this->db->where('id_kegiatan_keluarga', $id_kegiatan_keluarga);
        $this->db->delete('kegiatan_keluarga');
    }

}
