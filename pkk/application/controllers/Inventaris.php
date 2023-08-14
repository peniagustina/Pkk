<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        verify_session();
        verify_sekretaris_pkk();
		$this->load->model('Inventaris_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
	}
	public function index()
	{
		$data = array(
            'inventaris_data' => $this->Inventaris_model->get_all(),
        );
        $this->template->load('template','inventaris/inventaris_list', $data);		
	}
	public function read($id)
	{	
		$row = $this->Inventaris_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_barang' => $row->id_barang,
                'nama_barang' => $row->nama_barang,
                'asal_brg' => $row->asal_brg,
                'tanggal' => $row->tanggal,            
                'jumlah' => $row->jumlah,
                'peyimpanan' => $row->peyimpanan,
                'kondisi' => $row->kondisi,
                'keterangan' => $row->keterangan,
            );
            $this->template->load('template','inventaris/inventaris_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('inventaris'));
        }
	}
	public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('inventaris/create_action'),
            'id_barang' => set_value('id_barang'),
            'nama_barang' => set_value('nama_barang'),
            'asal_brg' => set_value('asal_brg'),
            'tanggal' => date('Y-m-d H:i'),
            'jumlah' => set_value('jumlah'),
            'peyimpanan' => set_value('peyimpanan'),
            'kondisi' => set_value('kondisi'),
            'keterangan' => set_value('keterangan'),
        );
        $this->template->load('template','inventaris/inventaris_form', $data);
    }
	public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
		} else {
			$data = array(
				'nama_barang' => $this->input->post('nama_barang',TRUE),
				'asal_brg' => $this->input->post('asal_brg',TRUE),
				'tanggal' => $this->input->post('tanggal',TRUE),
				'jumlah' => $this->input->post('jumlah',TRUE),
				'peyimpanan' => $this->input->post('peyimpanan',TRUE),
				'kondisi' => $this->input->post('kondisi',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
			);
			$this->Inventaris_model->insert($data);
			$this->session->set_flashdata('message', 'Berhasil Tambah Data');
			redirect(site_url('inventaris'));
		}
	}
	public function update($id) 
    {
        $row = $this->Inventaris_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
				'action' => site_url('inventaris/update_action'),
				'id_barang' => set_value('id_barang', $row->id_barang),
				'nama_barang' => set_value('nama_barang', $row->nama_barang),
				'asal_brg' => set_value('asal_brg', $row->asal_brg),				
				'tanggal' => set_value('tanggal', $row->tanggal),
				'jumlah' => set_value('jumlah', $row->jumlah),
				'peyimpanan' => set_value('peyimpanan', $row->peyimpanan),
				'kondisi' => set_value('kondisi', $row->kondisi),
				'keterangan' => set_value('keterangan', $row->keterangan),
			);
            $this->template->load('template','inventaris/inventaris_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('kader'));
        }
    }
	public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
				'nama_barang' => $this->input->post('nama_barang',TRUE),
				'asal_brg' => $this->input->post('asal_brg',TRUE),
				'tanggal' => $this->input->post('tanggal',TRUE),
				'jumlah' => $this->input->post('jumlah',TRUE),
				'peyimpanan' => $this->input->post('peyimpanan',TRUE),
				'kondisi' => $this->input->post('kondisi',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),	
			);

            $this->Inventaris_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil Edit Data');
            redirect(site_url('inventaris'));
        }
    }
	public function delete($id) 
    {
        $row = $this->Inventaris_model->get_by_id($id);

        if ($row) {
            $this->Inventaris_model->delete($id);
            $this->session->set_flashdata('message', 'Berhasil Hapus Data');
            redirect(site_url('inventaris'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('inventaris'));
        }
    }

	public function _rules() 
    {
      $this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim|required');
      $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
      $this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }
	
}
