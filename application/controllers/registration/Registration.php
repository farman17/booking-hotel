<?php
/**
* 
*/
class Registration extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('form');
	}

	function index() {
		$this->load->view('/registration/daftar');

	}

	function add_user() {
		$this->load->model('user/user_model');
		$image_path =  "application/user_images/images";
		$config['upload_path']   = $image_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '500';
		$config['max_height']    = '450';
		$config['max_width']     = '450';
		$this->load->library('upload', $config);
		$path = $this->upload->data();
		$image_path1 = $path['file_path'];
		$data = array(
			'username' => $this->input->post('username'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'no_telepon' => $this->input->post('no_telepon'),
			'tanggal_lahir' => $this->input->post('dob'),
			);

		$this->db->select('username');
		$this->db->where('username', $data['username']);
		$result = $this->db->get('user');

		if($result->num_rows() > 0) {
			echo "Udah ada";
			$this->output->set_header('refresh:2; url='.site_url("/registration"));
		
		} else {
			$this->user_model->insert($data);
			$return = $this->upload->data();
			echo "Registrasi Berhasil"; 
			$this->output->set_header('refresh:2; url='.site_url("/login"));
		}
	}
}