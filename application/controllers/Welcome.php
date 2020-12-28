<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$this->load->model('gedung/gedung_model');
		$data['res'] = $this->gedung_model->get_all();
		$this->load->view('welcome_screen', $data);
	}
}
