<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		verify_session();
		$this->load->model('Anggota_model');
		$this->load->model('Keluarga_model');
		$this->load->model('Detail_keluarga_model');
		$this->load->model('Kegiatan_pkk_model');
		$this->load->model('Kader_model');
		$this->load->model('Event_model');
		$this->load->model('Wilayah_model');
		$this->load->model('Inventaris_model');
		$this->load->model('Pengguna_model');
		
	}

	public function index()
	{
		redirect('dashboard');
	}

	public function inventaris()
	{
		verify_semua_bisa();
		$data = array(
            'inventaris_data' => $this->Inventaris_model->get_all(),
        );
        $this->template->load('template','laporan/laporan_inventaris', $data);		
	}

	public function cetak_laporan_inventaris()
	{
		verify_semua_bisa();
		$data = array(
            'inventaris_data' => $this->Inventaris_model->get_all(),
        );
        $this->load->view('laporan/cetak/cetak_laporan_inventaris', $data, FALSE);		
	}
	////////////////////////////////////
	public function anggota()
	{
		verify_semua_bisa();

		$data = array(
            'anggota_data' => $this->Anggota_model->get_all(),
        );
        $this->template->load('template','laporan/laporan_anggota', $data);
	}

	public function cetak_laporan_anggota()
	{
		verify_semua_bisa();

		$data = array(
            'anggota_data' => $this->Anggota_model->get_all(),
        );
        $this->load->view('laporan/cetak/cetak_anggota', $data, FALSE);
	}

	//////////////////////////////////////////////////////

	public function keluarga()
	{
		verify_semua_bisa();

		$data = array(
			'keluarga_data' => $this->Keluarga_model->get_all(),
		);
		$this->template->load('template','laporan/laporan_keluarga', $data);
	}

	public function cetak_laporan_keluarga()
	{
		verify_semua_bisa();

		$data = array(
			'keluarga_data' => $this->Keluarga_model->get_all(),
		);
		$this->load->view('laporan/cetak/cetak_keluarga', $data, FALSE);
	}

	public function detail_kk($no_kk)
	{
		verify_semua_bisa();

		$row = $this->Keluarga_model->get_by_id($no_kk);
		if ($row) {
			$data = array(
				'no_kk' => $row->no_kk,
				'keterangan' => $row->keterangan,
				'id_wilayah' => $row->id_wilayah,
				'nama_wilayah' => $this->Wilayah_model->get_by_id($row->id_wilayah)->nama_wilayah,
				'detail_kk' => $this->Keluarga_model->get_detail_kelurga($no_kk),
			);
			$this->template->load('template','laporan/laporan_detail_keluarga', $data);
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(site_url('laporan/keluarga'));
		}
	}

	public function cetak_laporan_detail_keluarga($no_kk)
	{
		verify_semua_bisa();

		$row = $this->Keluarga_model->get_by_id($no_kk);
		if ($row) {
			$data = array(
				'no_kk' => $row->no_kk,
				'keterangan' => $row->keterangan,
				'id_wilayah' => $row->id_wilayah,
				'nama_wilayah' => $this->Wilayah_model->get_by_id($row->id_wilayah)->nama_wilayah,
				'detail_kk' => $this->Keluarga_model->get_detail_kelurga($no_kk),
			);
			$this->load->view('laporan/cetak/cetak_detail_keluarga', $data, FALSE);
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(site_url('laporan/keluarga'));
		}
	}


	public function kegiatan_pkk()
	{
		verify_dasawisma();

		if (!isset($_SESSION['tanggal_awal']) AND !isset($_SESSION['tanggal_akhir'])) {
	    	$_SESSION['tanggal_awal']=date('Y-m-d');
	    	$_SESSION['tanggal_akhir']=date('Y-m-d');
	       	$tanggal_awal=$_SESSION['tanggal_awal'];
	       	$tanggal_akhir=$_SESSION['tanggal_akhir'];
	   	} else {
			$tanggal_awal=$_SESSION['tanggal_awal'];
	       	$tanggal_akhir=$_SESSION['tanggal_akhir'];
		}

		$data = array(
            'kegiatan_pkk_data' => $this->Kegiatan_pkk_model->get_laporan_by_tanggal($tanggal_awal, $tanggal_akhir),
        );
        $this->template->load('template','laporan/laporan_kegiatan_pkk', $data);
	}

	public function cari_laporan_kegiatan_pkk()
	{
		verify_dasawisma();

		$_SESSION['tanggal_awal'] = $this->input->post('tanggal_awal');
		$_SESSION['tanggal_akhir'] = $this->input->post('tanggal_akhir');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function cetak_laporan_kegiatan_pkk()
	{
		verify_dasawisma();

		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');

		$data = array(
            'kegiatan_pkk_data' => $this->Kegiatan_pkk_model->get_laporan_by_tanggal($tanggal_awal, $tanggal_akhir),
        );
        $this->load->view('laporan/cetak/cetak_kegiatan_pkk', $data, FALSE);
	}

	public function detail_kegiatan_pkk($id_kegiatan_pkk)
	{
		verify_dasawisma();

		$row = $this->Kegiatan_pkk_model->get_by_id($id_kegiatan_pkk);
        if ($row) {
            $data = array(
				'id_kegiatan_pkk' => $row->id_kegiatan_pkk,
				'nama_kegiatan' => $row->nama_kegiatan,
				'tempat_kegiatan' => $row->tempat_kegiatan,
				'tanggal_kegiatan' => $row->tanggal_kegiatan,
				'keterangan' => $row->keterangan,
                'data_kegiatan_keluarga' => $this->Kegiatan_pkk_model->get_data_kegiatan_keluarga($row->id_kegiatan_pkk),
			);
            $this->template->load('template','laporan/laporan_detail_kegiatan_pkk', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('laporan/kegiatan_pkk'));
        }
	}

	public function cetak_laporan_detail_kegiatan_pkk($id_kegiatan_pkk)
	{
		verify_dasawisma();

		$row = $this->Kegiatan_pkk_model->get_by_id($id_kegiatan_pkk);
        if ($row) {
            $data = array(
				'id_kegiatan_pkk' => $row->id_kegiatan_pkk,
				'nama_kegiatan' => $row->nama_kegiatan,
				'tempat_kegiatan' => $row->tempat_kegiatan,
				'tanggal_kegiatan' => $row->tanggal_kegiatan,
				'keterangan' => $row->keterangan,
                'data_kegiatan_keluarga' => $this->Kegiatan_pkk_model->get_data_kegiatan_keluarga($row->id_kegiatan_pkk),
			);
            $this->load->view('laporan/cetak/cetak_detail_kegiatan_pkk', $data, FALSE);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('laporan/kegiatan_pkk'));
        }
	}

	//////////////////////////////////////////////////////////////////////////

	public function kader()
	{
		verify_sekretaris_dasawisma();

		$data = array(
            'kader_data' => $this->Kader_model->get_all(),
        );
        $this->template->load('template','laporan/laporan_kader', $data);
	}

	public function cetak_laporan_kader()
	{
		verify_sekretaris_dasawisma();

		$data = array(
            'kader_data' => $this->Kader_model->get_all(),
        );
        $this->load->view('laporan/cetak/cetak_kader', $data, FALSE);
	}

	/////////////////////////////////////////////////////////////////////////

	public function event()
	{
		verify_sekretaris_ketua();

		if (!isset($_SESSION['tanggal_awal']) AND !isset($_SESSION['tanggal_akhir'])) {
	    	$_SESSION['tanggal_awal']=date('Y-m-d');
	    	$_SESSION['tanggal_akhir']=date('Y-m-d');
	       	$tanggal_awal=$_SESSION['tanggal_awal'];
	       	$tanggal_akhir=$_SESSION['tanggal_akhir'];
	   	} else {
			$tanggal_awal=$_SESSION['tanggal_awal'];
	       	$tanggal_akhir=$_SESSION['tanggal_akhir'];
		}

		$data = array(
            'event_data' => $this->Event_model->get_event_by_tanggal($tanggal_awal, $tanggal_akhir),
        );
        $this->template->load('template','laporan/laporan_event', $data);
	}

	public function cari_laporan_event()
	{
		verify_sekretaris_ketua();

		$_SESSION['tanggal_awal'] = $this->input->post('tanggal_awal');
		$_SESSION['tanggal_akhir'] = $this->input->post('tanggal_akhir');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function cetak_laporan_event()
	{
		verify_sekretaris_ketua();

		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');

		$data = array(
            'event_data' => $this->Event_model->get_event_by_tanggal($tanggal_awal, $tanggal_akhir),
        );
        $this->load->view('laporan/cetak/cetak_event', $data, FALSE);
	}

	////////////////////////////////////////////////////////////////

	public function pengguna()
	{
		verify_sekretaris_pkk();

		$data = array(
            'pengguna_data' => $this->Pengguna_model->get_all(),
        );
        $this->template->load('template','laporan/laporan_pengguna', $data);
	}

	public function cetak_laporan_pengguna()
	{
		verify_sekretaris_pkk();

		$data = array(
            'pengguna_data' => $this->Pengguna_model->get_all(),
        );
        $this->load->view('laporan/cetak/cetak_pengguna', $data, FALSE);
	}

	////////////////////////////////////////////////////////////////

	public function wilayah()
	{
		verify_sekretaris_pkk();

		$data = array(
            'wilayah_data' => $this->Wilayah_model->get_all(),
        );
        $this->template->load('template','laporan/laporan_wilayah', $data);
	}

	public function cetak_laporan_wilayah()
	{
		verify_sekretaris_pkk();

		$data = array(
            'wilayah_data' => $this->Wilayah_model->get_all(),
        );
        $this->load->view('laporan/cetak/cetak_wilayah', $data, FALSE);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
