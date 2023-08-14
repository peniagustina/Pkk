<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		verify_session();
		$this->load->model('Dashboard_model');
	}

	public function index()
	{
		$data = array(
			'count_event' => $this->Dashboard_model->count_event(),
			'count_keluarga' => $this->Dashboard_model->count_keluarga(),
			'count_anggota_pkk' => $this->Dashboard_model->count_anggota_pkk(),
			'count_kegiatan_pkk' => $this->Dashboard_model->count_kegiatan_pkk(),
			'count_pengguna' => $this->Dashboard_model->count_pengguna(),
			'count_kader' => $this->Dashboard_model->count_kader(),
			'count_wilayah' => $this->Dashboard_model->count_wilayah(),
		);
		$this->template->load('template','dashboard', $data);
	}

	public function get_events()
	{
	 // Our Start and End Dates
		$start = $this->input->get("start");
		$end = $this->input->get("end");

		$startdt = new DateTime('now'); // setup a local datetime
		$startdt->setTimestamp($start); // Set the date based on timestamp
		$start_format = $startdt->format('Y-m-d H:i:s');

		$enddt = new DateTime('now'); // setup a local datetime
		$enddt->setTimestamp($end); // Set the date based on timestamp
		$end_format = $enddt->format('Y-m-d H:i:s');

		$events = $this->db->query("select * from event where tanggal >= '$start_format' and tanggal <= '$end_format'")->result();
		$data_events = array();

		foreach($events as $r) {

		 	$data_events[] = array(
		 		"id" => "$r->id_event-$r->nama_event",
		 		"title" => "$r->nama_event $r->tempat",
		 		"nama_event" => "$r->nama_event",
		 		"start" => $r->tanggal,
		 		"tempat" => $r->tempat,
		 		"keterangan" => $r->keterangan,
		 		"color" => 'green',

		 	);
	 }

	 echo json_encode(array("events" => $data_events));
	 exit();
	}

}

