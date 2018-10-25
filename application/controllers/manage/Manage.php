<?php

class Manage extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$session_id = $this->session->userdata('username');
		if(empty($session_id)) {
			$this->load->view('manage/manage_login');
		}
	}

	function index() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if ($username == 'manage' && $password == 'root') {
			$session = array (
				'username' => $username,
				'logged_in' => TRUE,
				'session_id' => session_id()
				);
			$this->session->set_userdata($session);
			redirect('manage/dashboard');
		}
	}

	function dashboard() {
		$this->load->view('manage/dashboard');
	}

	function all_export_to_pdf() {
		$this->load->helper('warsito_pdf_helper');
		$this->load->model('gedung/gedung_model');
		$data['row'] = $this->gedung_model->laporan_perawatan_keseluruhan();
		$object = $this->load->view('manage/pdf_report_all', $data, true);
		$filename = 'Report.pdf';
		generate_pdf($object, $filename, true);
	}

	function listrik_export_to_pdf() {
		$this->load->helper('warsito_pdf_helper');
		$this->load->model('gedung/gedung_model');
		$data['row'] = $this->gedung_model->laporan_perawatan("Pembayaran Listrik");
		$object = $this->load->view('manage/pdf_report_listrik', $data, true);
		$filename = 'Report Listrik.pdf';
		generate_pdf($object, $filename, true);
	}

	function air_export_to_pdf() {
		$this->load->helper('warsito_pdf_helper');
		$this->load->model('gedung/gedung_model');
		$data['row'] = $this->gedung_model->laporan_perawatan("Pembayaran Air");
		$object = $this->load->view('manage/pdf_report_air', $data, true);
		$filename = 'Report Air.pdf';
		generate_pdf($object, $filename, true);
	}

	function kebersihan_export_to_pdf() {
		$this->load->helper('warsito_pdf_helper');
		$this->load->model('gedung/gedung_model');
		$data['row'] = $this->gedung_model->laporan_perawatan("Pembayaran Kebersihan");
		$object = $this->load->view('manage/pdf_report_kebersihan', $data, true);
		$filename = 'Report Kebersihan.pdf';
		generate_pdf($object, $filename, true);
	}
 
	function laporan_perawatan() {
		$this->load->model('gedung/gedung_model');
		$category = $this->input->get('jenis_laporan');

		if($category == 'Pembayaran Listrik') {
			$data['row'] = $this->gedung_model->laporan_perawatan($category);
			$this->load->view('manage/report_perawatan_listrik', $data);
		} else if ($category == 'Pembayaran Air'){
			$data['row'] = $this->gedung_model->laporan_perawatan($category);
			$this->load->view('manage/report_perawatan_air', $data);
		} else if($category == 'Pembayaran Kebersihan') {
			$data['row'] = $this->gedung_model->laporan_perawatan($category);
			$this->load->view('manage/report_perawatan_kebersihan', $data);
		} else if($category == 'All') {
			$data['row'] = $this->gedung_model->laporan_perawatan_keseluruhan();
			$this->load->view('manage/report_perawatan_all', $data);
		} else {
			$this->load->view('manage/report_perawatan');
		}
	}

	function laporan_kegiatan() {
		$this->load->model('gedung/gedung_model');
		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');
		$submit = $this->input->get('submit');
		if(!empty($submit)) {
			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;
			$data['report'] = $this->gedung_model->jadwal_gedung($start_date, $end_date);
			$this->load->view('manage/report_kegiatan_periodic', $data);
		} else {
			$this->load->view('manage/report_kegiatan');
		}
	}

	function kegiatan_export_pdf($start_date, $end_date) {
		$this->load->model('gedung/gedung_model');
		$this->load->helper('warsito_pdf_helper');
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['report'] = $this->gedung_model->jadwal_gedung($start_date, $end_date);
		$object = $this->load->view('manage/pdf_report_kegiatan', $data, true);
		$filename = "Report Kegiatan.pdf";
		generate_pdf($object, $filename, true);
	}
}