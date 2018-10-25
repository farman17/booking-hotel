<?php
/**
* 
*/
class Admin_Controls extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$session_id = $this->session->userdata('username');
		if(empty($session_id)) {
			redirect(site_url('admin'));
		}
	}

	function index() {
		$this->load->view('admin/home');
	}

	function tambah_gedung() {
		$this->load->helper('form');
		$this->load->helper('url');
		$submit = $this->input->post('submit');
		$this->load->model('gedung/gedung_model');
		$path = "./assets/images/gedung/";
		$img_name = "listrik_".date('dmY_his');
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = '500';
		$config['max_width'] = '500';
		$config['max_height'] = '500';
		$this->load->library('upload', $config);
		$img_name = $this->upload->data();

		if(!empty($submit)) {
			$data = array(
			'NAMA_GEDUNG' => $this->input->post('nama_gedung'), 
			'KAPASITAS' => $this->input->post('kapasitas_gedung'),
			'ALAMAT' => $this->input->post('alamat_gedung'),
			'DESKRIPSI_GEDUNG' => $this->input->post('deskripsi_gedung'),
			'HARGA_SEWA' => $this->input->post('harga_sewa')
			);
			//$success = array();
			//$upload_files = array(
			//	'img_gedung1' => $_FILES['img_gedung1'],
			//	'img_gedung2' => $_FILES['img_gedung2'],
			//	'img_gedung3' => $_FILES['img_gedung3']
			//	);

			foreach($_FILES as $key => $value) {

				if(!empty($value['name'])) {

					if(!$this->upload->do_upload($key)) {
						echo '<script type="text/javascript"> alert("Terjadi Kesalahan, Periksa Resolusi dan Ukuran File Upload Anda");
						</script>';
					} else {
						$files = $this->upload->data();
						$base_url = base_url();
					$img_path = $base_url. "assets/images/gedung/";
					$this->gedung_model->insert_gedung($data);
					$this->gedung_model->get_last_id_gedung();
					$id_gedung = $this->gedung_model->get_last_id_gedung();
					$img_data = array(
						'ID_GEDUNG' => $id_gedung->ID_GEDUNG,
						'NAMA_GEDUNG' => $this->input->post('nama_gedung'),
						'PATH' => $img_path,
						'IMG_NAME' => $files['file_name']
						);
					$this->gedung_model->insert_gedung_img($img_data);
					redirect('admin/gedung');
					}
					//else {
					//code..
					//}
				}
			}
			//var_dump($errors);
			//var_dump($success);
		}
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$this->load->view('admin/tambah_gedung', $data);
	}

	function rekap_aktivitas() {
		$this->load->model('gedung/gedung_model');
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['get_transaction'] = $this->gedung_model->get_unread_transaction();
		$this->load->view('admin/rekap_aktivitas', $data);
	}

	function rekap_aktivitas_det($tanggal_awal, $tanggal_akhir) {
		$first_date = $this->input->get('start_date');
		$second_date = $this->input->get('end_date');
		$this->load->model('gedung/gedung_model');
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['get_transaction'] = $this->gedung_model->get_unread_transaction();
		$data['hasil'] = $this->gedung_model->jadwal_gedung($first_date, $second_date);
		$data['first_period'] = $first_date;
		$data['last_period'] = $second_date;
		$this->load->view('admin/rekap_aktivitas_det', $data);
	}

	function rekap_pembayaran() {
		$this->load->model('gedung/gedung_model');
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['get_transaction'] = $this->gedung_model->get_unread_transaction();
		$this->load->view('admin/rekap_pembayaran', $data);
	}

	function rekap_pembayaran_det($tanggal_awal, $tanggal_akhir) {
		$this->load->model('gedung/gedung_model');
		$tanggal_awal = $this->input->get('start_date');
		$tanggal_akhir = $this->input->get('end_date');
		$data['start_date'] = $tanggal_awal;
		$data['end_date'] = $tanggal_akhir;
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['get_transaction'] = $this->gedung_model->get_unread_transaction();
		$data['row'] = $this->gedung_model->laporan_perawatan_periodic($tanggal_awal, $tanggal_akhir);
		$this->load->view('admin/rekap_pembayaran_det', $data);
	}

	function rekap_transaksi() {
		$this->load->model('gedung/gedung_model');
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['get_transaction'] = $this->gedung_model->get_unread_transaction();
		$this->load->view('admin/rekap_transaksi', $data);
	}

	function rekap_transaksi_det($tanggal_awal, $tanggal_akhir) {
		$this->load->model('gedung/gedung_model');
		$tanggal_awal = $this->input->get('start_date');
		$tanggal_akhir = $this->input->get('end_date');
		$data['start_date'] = $tanggal_awal;
		$data['end_date'] = $tanggal_akhir;
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['get_transaction'] = $this->gedung_model->get_unread_transaction();
		$data['row'] = $this->gedung_model->laporan_pembayaran_periodic($tanggal_awal, $tanggal_akhir);
		$this->load->view('admin/rekap_transaksi_det', $data);
	}

	function transaksi_export_pdf($start_date, $end_date) {
		$this->load->model('gedung/gedung_model');
		$this->load->helper('warsito_pdf_helper');
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['report'] = $this->gedung_model->laporan_pembayaran_periodic($start_date, $end_date);
		$object = $this->load->view('admin/pdf_report_transaksi', $data, true);
		$filename = "Report Transaksi.pdf";
		generate_pdf($object, $filename, true);
	}

	function pembayaran_listrik() {
		$this->load->model('gedung/gedung_model');
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['gedung'] = $this->gedung_model->get_gedung();		
		
		$upload_path = "./assets/images/bukti-pembayaran/";
		$img_name = "Listrik_".date('dmY_his');
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = '800';
		$config['max_width'] = '1000';
		$config['max_height'] = '1000';
		$config['file_name'] = $img_name;
		$this->load->library('upload', $config);
		$path = base_url().'assets/images/bukti-pembayaran/';
		$submit = $this->input->post('submit');

		if(!empty($submit)) {
			if(!$this->upload->do_upload('bukti_pembayaran')) {
				echo $this->upload->display_errors();
		    } else {
		    	$perawatan = array(
		    		'NO_ID' => $this->input->post('no_id'),
		    		'NAMA_PERAWATAN' => $this->input->post('nama_perawatan'),
		    		'NAMA_GEDUNG' => $this->input->post('nama_gedung'),
		    		'TANGGAL_PEMBAYARAN' => $this->input->post('tanggal_pembayaran'),
		    		'NO_ID' => $this->input->post('no_id'),
		    		'BIAYA' => $this->input->post('biaya'), 
		    		'PATH' => $path,
		    		'IMG_NAME' => $img_name
		    		);
		    	$this->gedung_model->insert_perawatan($perawatan);
		    	redirect('admin/dashboard');
		    }
		}
		$this->load->view('admin/pembayaran_listrik', $data);
	}

	function pembayaran_air() {
		$this->load->model('gedung/gedung_model');
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['gedung'] = $this->gedung_model->get_gedung();
		
		$upload_path = "./assets/images/bukti-pembayaran/";
		$img_name = "Air_".date('dmY_his');
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = '800';
		$config['max_width'] = '1000';
		$config['max_height'] = '1000';
		$config['file_name'] = $img_name;
		$this->load->library('upload', $config);
		$path = base_url().'assets/images/bukti-pembayaran/';
		$submit = $this->input->post('submit');

		if(!empty($submit)) {
			if(!$this->upload->do_upload('bukti_pembayaran')) {
				echo $this->upload->display_errors();
		    } else {
		    	$perawatan = array(
		    		'NO_ID' => $this->input->post('no_id'),
		    		'NAMA_PERAWATAN' => $this->input->post('nama_perawatan'),
		    		'NAMA_GEDUNG' => $this->input->post('nama_gedung'),
		    		'TANGGAL_PEMBAYARAN' => $this->input->post('tanggal_pembayaran'),
		    		'NO_ID' => $this->input->post('no_id'),
		    		'BIAYA' => $this->input->post('biaya'), 
		    		'PATH' => $path,
		    		'IMG_NAME' => $img_name
		    		);
		    	$this->gedung_model->insert_perawatan($perawatan);
		    	redirect('admin/dashboard');
		    }
		}
		$this->load->view('admin/pembayaran_air', $data);
	}

	function pembayaran_kebersihan() {
		$this->load->model('gedung/gedung_model');
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['gedung'] = $this->gedung_model->get_gedung();
		
		$upload_path = "./assets/images/bukti-pembayaran/";
		$img_name = "Kebersihan_".date('dmY_his');
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = '800';
		$config['max_width'] = '1000';
		$config['max_height'] = '1000';
		$config['file_name'] = $img_name;
		$this->load->library('upload', $config);
		$path = base_url().'assets/images/bukti-pembayaran/';
		$submit = $this->input->post('submit');

		if(!empty($submit)) {
			if(!$this->upload->do_upload('bukti_pembayaran')) {
				echo $this->upload->display_errors();
		    } else {
		    	$perawatan = array(
		    		'NO_ID' => $this->input->post('no_id'),
		    		'NAMA_PERAWATAN' => $this->input->post('nama_perawatan'),
		    		'TANGGAL_PEMBAYARAN' => $this->input->post('tanggal_pembayaran'),
		    		'NAMA_GEDUNG' => $this->input->post('nama_gedung'),
		    		'NO_ID' => $this->input->post('no_id'),
		    		'BIAYA' => $this->input->post('biaya'), 
		    		'PATH' => $path,
		    		'IMG_NAME' => $img_name
		    		);
		    	$this->gedung_model->insert_perawatan($perawatan);
		    	redirect('admin/dashboard');
		    }
		}
		$this->load->view('admin/pembayaran_kebersihan', $data);
	}

	function detail_pemesanan($id_pemesanan) {
		$this->load->model('gedung/gedung_model');
		$hasil['hasil'] = $this->gedung_model->get_detail_pesanan($id_pemesanan);
		$hasil['result'] = $this->gedung_model->get_pending_transaction();
		$this->load->view('admin/detail_pemesanan', $hasil);
	}

	function pembayaran() {
		$this->load->model('gedung/gedung_model');
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['get_transaction'] = $this->gedung_model->get_unread_transaction();
		$data['pembayaran'] = $this->gedung_model->get_all_pembayaran();
		$this->load->view('admin/pembayaran', $data);
	}

	function delete_jadwal($id_gedung) {
		$this->load->model('gedung/gedung_model');
		$data = array (
			'FINAL_STATUS' => 2
		);
		$this->gedung_model->delete_jadwal($id_gedung, $data);
		redirect('admin/dashboard');
	}

	function pemesanan2() {
		$this->load->model('gedung/gedung_model');
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['get_transaction'] = $this->gedung_model->get_unread_transaction();
		$data['pemesanan'] = $this->gedung_model->get_all_pemesanan();
		$this->load->view('admin/pemesanan_2', $data);
	}

	function read_transaction($id_pembayaran) {
		$this->load->model('gedung/gedung_model');
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['get_transaction'] = $this->gedung_model->get_unread_transaction();
		$data['details'] = $this->gedung_model->get_detail_pembayaran($id_pembayaran);
		$this->gedung_model->set_finish_transaction($id_pembayaran);
		$this->load->view('admin/detail_pembayaran', $data);
	}

	function transaksi() {
		$this->load->model('gedung/gedung_model');
		$data['pemesanan'] = $this->gedung_model->get_all_pending_transaction();
		$data['get_transaction'] = $this->gedung_model->get_unread_transaction();
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$this->load->view('admin/pemesanan', $data);
	}

	function detail_transaksi($id_pemesanan) {
		$this->load->helper('date');
		$tanggal_approval = '%Y-%m-%d';
		$this->load->model('gedung/gedung_model');
		
		$temp_id = substr($id_pemesanan, 7);
		$data['details'] = $this->gedung_model->get_proposal_by_id($temp_id);
		$data['hasil'] = $this->gedung_model->get_detail_pesanan($id_pemesanan);
		$data['result'] = $this->gedung_model->get_pending_transaction();
		
		$email = $this->gedung_model->get_detail_pesanan($id_pemesanan)->EMAIL;
		
		$mail['username'] = $this->gedung_model->get_detail_pesanan($id_pemesanan)->USERNAME;
		$mail['nama_gedung'] = $this->gedung_model->get_detail_pesanan($id_pemesanan)->NAMA_GEDUNG;
		$mail['tgl_pemesanan'] = $this->gedung_model->get_detail_pesanan($id_pemesanan)->TANGGAL_PEMESANAN;
		$mail['tgl_deadline'] = date("Y-m-d", strtotime("+2 day"));
		$mail['jumlah_pembayaran'] = $this->gedung_model->get_detail_pesanan($id_pemesanan)->TOTAL_KESELURUHAN;
		$mail['harga_gedung'] = $this->gedung_model->get_detail_pesanan($id_pemesanan)->HARGA_SEWA;
		$mail['tgl_approval'] = mdate($tanggal_approval);
		$mail['id_pesanan'] = $this->gedung_model->get_detail_pesanan($id_pemesanan)->ID_PEMESANAN;
		$mail['acara'] = $this->gedung_model->get_detail_pesanan($id_pemesanan)->DESKRIPSI_ACARA;
		$mail['tolak'] = $this->gedung_model->get_detail_pesanan($id_pemesanan)->REMARKS;
			
		$this->load->view('admin/detail_transaksi', $data);
		$submit = $this->input->post('submit');
		
		$pemesanan_fix_detail = array(
			'ID_PEMESANAN' => substr($this->uri->segment(3), 7),
			'USERNAME' => $this->gedung_model->get_detail_pesanan($id_pemesanan)->USERNAME,
			'TANGGAL_APPROVAL' => mdate($tanggal_approval),
			'TANGGAL_FINAL_PEMESANAN' => $this->gedung_model->get_detail_pesanan($id_pemesanan)->TANGGAL_PEMESANAN,
			'TANGGAL_DEADLINE' => date("Y-m-d", strtotime("+2 day")),
			'FINAL_STATUS' => 1
			);

		if(!empty($submit)) {
			$status = $this->input->post('status-proposal');
			$remarks =  $this->input->post('remarks');

		    if($this->input->post('status-proposal') == 1) {
		    	$this->gedung_model->insert_pemesanan_fix_detail($pemesanan_fix_detail);
		    	$this->gedung_model->update_transaksi($temp_id, $status, $remarks);
		    	$pesan = $this->load->view('admin/mail_body', $mail, true);
		    	$this->send_mail($email, $pesan);
		    	//$this->load->view('admin/mail_body', $mail);
		    	redirect('admin/transaksi');
		    } else if($this->input->post('status-proposal') == 2) {
		    	$this->gedung_model->update_transaksi($temp_id, $status, $remarks);
		    	$reject = $this->load->view('admin/reject_pesanan', $mail, true);
		    	$this->gedung_model->update_transaksi($temp_id, $status, $remarks);
		    	$this->send_mail($email, $reject);
		    	redirect('admin/transaksi');
		    	//$this->load->view('admin/reject_pesanan', $mail);
		    }
		}
	}

	function send_mail($to_email, $pesan) {
		$from_email = "Admin Pembayaran";
		$this->load->library('email');
		$this->email->from($from_email, 'admin@reservasigedung.com');
		$this->email->to($to_email);
		$this->email->subject('Deadline Pembayaran Reservasi Gedung');
		$this->email->set_mailtype('html');
		$this->email->message($pesan);
		$this->email->send();
		if(!$this->email->send()) {
			$this->email->print_debugger();
		}

	}

	function download_proposal($id_pemesanan) {
		$this->load->helper('download');
		$this->load->model('gedung/gedung_model');
		$temp_id = substr($id_pemesanan, 7);
		$data = $this->gedung_model->get_proposal_by_id($temp_id);
		$path = file_get_contents($data->PATH.$data->FILE_NAME);
		$file_name = $data->FILE_NAME;
		force_download($file_name, $path);
	}

	function update_transaksi($id_pemesanan) {
		$this->load->model('gedung/gedung_model');
		$this->load->helper('form');
		$temp_id = substr($id_pemesanan, 7);
		
	}

	function tambah_catering() {
		$this->load->helper('form');
		$this->load->helper('url');
		$submit = $this->input->post('submit');
		$this->load->model('catering/catering_model');
		if(!empty($submit)) {
			$data = array(
			'NAMA_PAKET' => $this->input->post('nama_paket'), 
			'MENU_PEMBUKA' => $this->input->post('menu_pembuka'),
			'MENU_UTAMA' => $this->input->post('menu_utama'),
			'MENU_PENUTUP' => $this->input->post('menu_penutup'),
			'HARGA' => $this->input->post('harga')
			);
			$this->catering_model->add_catering($data);
			redirect('admin/catering');
		}
		$this->load->model('gedung/gedung_model');
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$this->load->view('admin/tambah_catering', $data);
	}

	function delete_gedung($id_gedung) {
		$this->load->model('gedung/gedung_model');
		$this->gedung_model->delete_gedung($id_gedung);
		redirect('admin/gedung');
	}

	function edit_gedung($id_gedung) {
		$this->load->model('gedung/gedung_model');
		$details['res'] = $this->gedung_model->get_pending_transaction();
		$details['result'] = $this->gedung_model->gedung_details($id_gedung);
		$this->load->view('admin/edit_gedung', $details);
		$simpan = $this->input->post('submit');
		if(!empty($simpan)) {
			$data = array(
				'NAMA_GEDUNG' => $this->input->post('nama_gedung'),
				'KAPASITAS' => $this->input->post('kapasitas_gedung'),
				'HARGA_SEWA' => $this->input->post('harga_sewa')
				);
			$this->gedung_model->update_gedung($id_gedung, $data);
			redirect('admin/gedung');
		}
	}

	function kegiatan_export_pdf($start_date, $end_date) {
		$this->load->model('gedung/gedung_model');
		$this->load->helper('warsito_pdf_helper');
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['report'] = $this->gedung_model->jadwal_gedung($start_date, $end_date);
		$object = $this->load->view('admin/pdf_report_kegiatan', $data, true);
		$filename = "Report Kegiatan.pdf";
		generate_pdf($object, $filename, true);
	}

	function perawatan_export_pdf($start_date, $end_date) {
		$this->load->model('gedung/gedung_model');
		$this->load->helper('warsito_pdf_helper');
		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;
		$data['report'] = $this->gedung_model->laporan_perawatan_periodic($start_date, $end_date);
		$object = $this->load->view('admin/pdf_report_perawatan', $data, true);
		$filename = "Report Perawatan.pdf";
		generate_pdf($object, $filename, true);
	}

	function dashboard() {
		$session_id = $this->session->userdata('username');
		if(empty($session_id)) {
			redirect(site_url('admin'));
		} else {
			$this->load->model('gedung/gedung_model');
			$data['front_data'] = $this->gedung_model->fixed_date();
			$data['result'] = $this->gedung_model->get_pending_transaction();
			$data['get_transaction'] = $this->gedung_model->get_unread_transaction();
			$this->load->view('admin/home', $data);
		}
	}

	function list_user() {
		$this->load->model('user/user_model');
		$this->load->model('gedung/gedung_model');
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['res'] = $this->user_model->get_all_users();
		$this->load->view('admin/list_user', $data);
	}

	function list_gedung() {
		$this->load->model('gedung/gedung_model');
		$data['result'] = $this->gedung_model->get_pending_transaction();
		$data['res'] = $this->gedung_model->get_gedung();
		$this->load->view('admin/list_gedung', $data);
	}

	function list_catering() {
		$this->load->model('catering/catering_model');
		$this->load->model('gedung/gedung_model');
		$data['res'] = $this->gedung_model->get_pending_transaction();
		$data['result'] = $this->catering_model->get_all();
		$this->load->view('admin/list_catering', $data);
	}

}