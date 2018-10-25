<?php
/**
* 
*/
class Pembayaran extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->load->model('pembayaran/pembayaran_model');
		$filename = "client-trf"."_".date('dmY_his').".jpg";
		$upload_path = "./assets/images/client-bukti-pembayaran/";
		$image_path = base_url()."assets/images/client-bukti-pembayaran/";
		$id_pemesanan = $this->input->post('no_pemesanan');
		$submit = $this->input->post('submit');
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'jpg';
		$config['max_size'] = '800';
		$config['file_name'] = $filename;
		$this->load->library('upload', $config);
		$img_name = $this->upload->data();
		$data = array(
			'ID_PEMESANAN' => substr($id_pemesanan, 7), 
			'ATAS_NAMA' => $this->input->post('atas_nama'),
			'NOMINAL_TRANSFER' => $this->input->post('jumlah_transfer'),
			'BANK_PENGIRIM' => $this->input->post('bank_dari'),
			'TANGGAL_TRANSFER' => $this->input->post('tgl_transfer'),
			'PATH' => $image_path,
			'IMG_NAME' => $img_name['file_name'].$img_name['file_ext']
		);

		if(!$this->upload->do_upload('bukti_transfer')) {
			//echo 'alert("$this->upload->display_errors()")';
		} else {
			$this->pembayaran_model->insert_pembayaran($data);
			$this->load->view('pembayaran/insert_success');
		}
		$this->load->view('pembayaran/form_pembayaran');
	}

}