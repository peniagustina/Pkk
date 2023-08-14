<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga_model extends CI_Model
{

    public $table = 'keluarga';
    //nah yang di bawah ini itu tadi pake $id
    // sedangkangkan yang di controller itu $no_kk
    public $no_kk = 'no_kk';
    public $order = 'DESC';

    // jadi kalau misal mbanya mau edit kan sudah buat dluan variablenya kalau misal di database itu namanya $no_kk pake nya juga harus $no_kk biar ngga bingung pas manggil variablenya jadi setiap mau ngapain di functionnya itu tau kalau mau edit data kn di database no_kk jadi buat juga
    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('a.*,b.*');
        $this->db->from('keluarga a');
        $this->db->where('a.status_keluarga', 'aktif');
        $this->db->join('wilayah b', 'a.id_wilayah = b.id_wilayah');
        return $this->db->get()->result();
    }
    
    function get_detail_kelurga($no_kk)
    {
        $this->db->select('*');
        $this->db->from('detail_keluarga');
        $this->db->where('status_keluarga', 'aktif');
        $this->db->where('no_kk', $no_kk);
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($no_kk)
    {
        // kalau di public itu sudah buat variabel $id di bawahnya jga harusa sama
        $this->db->where($this->no_kk, $no_kk);
        return $this->db->get($this->table)->row();
    }

    function cek_nokk($id)
    {
        $this->db->where($this->no_kk, $id);
        // kalau mau cek no_kk itu gak perlu yang di bawah ini karan kalau get data itu cuma where 
        // kalau pake fungsi inert pas di function insert 
        // jadi fucntio di bawha ini gak perlu
        // kaya yg ini tadi itu errror
        // $this->db->insert($this->table, $data);
    }    

    // insert data
    function insert($data)
    {

        $this->db->insert($this->table, $data);
    }

    function insert_detail($data)
    {
         $this->db->insert("detail_keluarga", $data);
    }

    // update data
    function update($no_kk, $data)
    // nah kalau ini kan variable yang ku buat di atas  itu bukan $no_kk jadi ikutin variable yang di buat
    // kalau ak coba update data itu pasti error
    // jadi kalau mau update pake lah yg variable $no_kk
    {
        $this->db->where($this->no_kk, $no_kk);
        $this->db->update($this->table, $data);
    }

    // delete data
        function nonaktif($no_kk)
        {
            $this->db->where($this->no_kk, $no_kk);
            $this->db->update('keluarga', array('status_keluarga' => 'nonaktif'));
        }
}
