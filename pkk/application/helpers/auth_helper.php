<?php defined('BASEPATH') OR exit('no direct access');

	function verify_session() {
		$CI = &get_instance();
		if ($CI->session->userdata('status') != "login_pkk") { 
			redirect(site_url('login'));
		}
	}

	function verify_dasawisma() {
		$CI = &get_instance();
		if ($CI->session->userdata('hak_akses') != "Dasawisma") {
			$CI->session->set_flashdata('message', 'Anda Tidak Memiliki Hak Akses');
			redirect(site_url('dashboard'));
		}
	}
	// Bendahara
	function verify_bendahara() {
		$CI = &get_instance();
		if ($CI->session->userdata('hak_akses') != "Bendahara") {
			$CI->session->set_flashdata('message', 'Anda Tidak Memiliki Hak Akses');
			redirect(site_url('dashboard'));
		}
	}

	function verify_sekretaris_pkk() {
		$CI = &get_instance();
		if ($CI->session->userdata('hak_akses') != "Sekretaris_PKK") {
			$CI->session->set_flashdata('message', 'Anda Tidak Memiliki Hak Akses');
			redirect(site_url('dashboard'));
		}
	}

	function verify_ketua() {
		$CI = &get_instance();
		if ($CI->session->userdata('hak_akses') != "Ketua") {
			$CI->session->set_flashdata('message', 'Anda Tidak Memiliki Hak Akses');
			redirect(site_url('dashboard'));
		}
	}

	function verify_semua_bisa(){
		$CI = &get_instance();
		if ($CI->session->userdata('hak_akses') != "Ketua" AND $CI->session->userdata('hak_akses') != "Sekretaris_PKK" AND $CI->session->userdata('hak_akses') != "Bendahara" AND $CI->session->userdata('hak_akses') != "Bendahara" AND $CI->session->userdata('hak_akses') != "Dasawisma") {
			$CI->session->set_flashdata('message', 'Anda Tidak Memiliki Hak Akses');
			redirect(site_url('dashboard'));
		}
	}

	function verify_dasawisma_ketua(){
		$CI = &get_instance();
		if ($CI->session->userdata('hak_akses') != "Ketua" AND $CI->session->userdata('hak_akses') != "Dasawisma") {
			$CI->session->set_flashdata('message', 'Anda Tidak Memiliki Hak Akses');
			redirect(site_url('dashboard'));
		}
	}

	function verify_sekretaris_dasawisma(){
		$CI = &get_instance();
		if ($CI->session->userdata('hak_akses') != "Sekretaris_PKK" AND $CI->session->userdata('hak_akses') != "Dasawisma") {
			$CI->session->set_flashdata('message', 'Anda Tidak Memiliki Hak Akses');
			redirect(site_url('dashboard'));
		}
	}

	function verify_sekretaris_ketua(){
		$CI = &get_instance();
		if ($CI->session->userdata('hak_akses') != "Sekretaris_PKK" AND $CI->session->userdata('hak_akses') != "Ketua") {
			$CI->session->set_flashdata('message', 'Anda Tidak Memiliki Hak Akses');
			redirect(site_url('dashboard'));
		}
	}

?>
