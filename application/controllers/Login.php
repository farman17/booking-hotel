<?php

class Login extends CI_Controller {

	/**
	* 
	*/
	function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	public function index() {
		$this->load->view('login');
	}

	function sign_in() {
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$this->db->select('USERNAME', 'PASSWORD');
		$where = array('USERNAME' => $user, 'PASSWORD' => $pass);
		$this->db->where($where);

		$result = $this->db->get('user');
		if($result->num_rows > 0) {
			$session_data = array(
				'username' => $user,
				'logged_in' => TRUE,
				'session_id' => session_id()
				);
			$this->session->set_userdata($session_data);
			echo "Login Berhasil Selamat Datang $user";
			redirect('home/'.$user.'/');
		} else {
			$this->output->set_header('refresh:2; url='.site_url("/login"));
			echo "Login Gagal";
		}
	}
}
?>
