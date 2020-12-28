<?php
/**
* 
*/
class Gedung_Model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function get_unread_transaction() {
		$sql = "SELECT * FROM PEMBAYARAN WHERE FLAG = 0";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function laporan_perawatan($nama_perawatan) {
		$sql = "SELECT * FROM PERAWATAN WHERE NAMA_PERAWATAN LIKE '%$nama_perawatan%'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function laporan_perawatan_keseluruhan() {
		$sql = "SELECT * FROM PERAWATAN ORDER BY NAMA_PERAWATAN";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function laporan_pembayaran_periodic($start_date, $end_date) {
		$sql = "SELECT * FROM PEMBAYARAN WHERE TANGGAL_TRANSFER BETWEEN '$start_date' AND '$end_date' ORDER BY ATAS_NAMA ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function laporan_perawatan_periodic($start_date, $end_date) {
		$sql = "SELECT * FROM PERAWATAN WHERE TANGGAL_PEMBAYARAN BETWEEN '$start_date' AND '$end_date' 
		        ORDER BY NAMA_PERAWATAN";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function delete_jadwal($id_pemesanan, $data) {
		$this->db->where('ID_PEMESANAN', $id_pemesanan);
		$this->db->update('pemesanan_fix_detail', $data);
	}

	public function set_finish_transaction($id_pembayaran) {
		$sql = "UPDATE pembayaran SET FLAG = 1 WHERE ID_PEMBAYARAN = $id_pembayaran";
		$query = $this->db->query($sql);
	}

	public function get_details_transaction($id_pembayaran) {
		$sql = "SELECT * FROM PEMBAYARAN WHERE ID_PEMBAYARAN = $id_pembayaran";
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function get_all() {
		$sql = "SELECT * FROM home_data";
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		return $hasil;
	}

	public function get_all_pembayaran() {
		$sql = "SELECT * FROM PEMBAYARAN";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_pemesanan_flag($username) {
		$query = "SELECT * FROM PEMESANAN WHERE USERNAME = '$username' AND FLAG = 1";
		$sql = $this->db->query($query);
		return $sql->num_rows();
	}

	public function insert_pemesanan_fix_detail($data) {
		$this->db->insert('pemesanan_fix_detail', $data);
	}

	public function jadwal_gedung($first_date, $second_date) {
		$sql = "SELECT 
		PEMESANAN_FIX_DETAIL.ID_PEMESANAN,
		PEMESANAN_FIX_DETAIL.TANGGAL_FINAL_PEMESANAN,
		PEMESANAN_FIX_DETAIL.TANGGAL_APPROVAL,
		GEDUNG.NAMA_GEDUNG,
		PEMESANAN_DETAILS.DESKRIPSI_ACARA,
		PEMESANAN_FIX_DETAIL.FINAL_STATUS,
		PEMESANAN_FIX_DETAIL.USERNAME,
		USER.NAMA_LENGKAP
		FROM PEMESANAN_FIX_DETAIL
		LEFT JOIN USER ON USER.USERNAME = PEMESANAN_FIX_DETAIL.USERNAME
		LEFT JOIN PEMESANAN ON PEMESANAN_FIX_DETAIL.ID_PEMESANAN = PEMESANAN.ID_PEMESANAN
		LEFT JOIN GEDUNG ON PEMESANAN.ID_GEDUNG = GEDUNG.ID_GEDUNG
		LEFT JOIN PEMESANAN_DETAILS ON PEMESANAN_FIX_DETAIL.ID_PEMESANAN = PEMESANAN_DETAILS.ID_PEMESANAN
		WHERE PEMESANAN_FIX_DETAIL.TANGGAL_FINAL_PEMESANAN BETWEEN '$first_date' AND '$second_date' 
		AND PEMESANAN_FIX_DETAIL.FINAL_STATUS = 1 
		ORDER BY PEMESANAN_FIX_DETAIL.TANGGAL_FINAL_PEMESANAN ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	} 

	public function fixed_date() {
		$sql = "SELECT 
		PEMESANAN_FIX_DETAIL.ID_PEMESANAN,
		PEMESANAN_FIX_DETAIL.USERNAME,
		PEMESANAN.ID_GEDUNG, 
		GEDUNG.NAMA_GEDUNG,
		PEMESANAN_FIX_DETAIL.TANGGAL_FINAL_PEMESANAN,
		CASE PEMESANAN_FIX_DETAIL.FINAL_STATUS WHEN 1 THEN 'FIXED DATE' END AS FINAL_STATUS

		FROM PEMESANAN_FIX_DETAIL
		JOIN PEMESANAN ON PEMESANAN_FIX_DETAIL.ID_PEMESANAN = PEMESANAN.ID_PEMESANAN
		JOIN GEDUNG ON PEMESANAN.ID_GEDUNG = GEDUNG.ID_GEDUNG
		WHERE PEMESANAN_FIX_DETAIL.FINAL_STATUS = 1
		ORDER BY TANGGAL_FINAL_PEMESANAN DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function check_date($date_order, $id_gedung) {
		$sql = "SELECT 
		pemesanan_fix_detail.TANGGAL_FINAL_PEMESANAN,
		pemesanan.ID_GEDUNG
		FROM pemesanan_fix_detail 
		JOIN pemesanan ON pemesanan_fix_detail.ID_PEMESANAN = pemesanan.ID_PEMESANAN
		WHERE pemesanan_fix_detail.TANGGAL_FINAL_PEMESANAN = '$date_order' AND pemesanan.ID_GEDUNG = $id_gedung";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function get_email_address($username) {
		$sql = "SELECT EMAIL FROM USER WHERE USERNAME = '$username'";
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function get_gedung() {
		$sql = "SELECT * FROM GEDUNG";
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		return $hasil;
	}

	public function insert_pemesanan($data) {
		$this->db->insert('pemesanan', $data);
	}

	public function get_last_id_pesanan() {
		$sql = "SELECT ID_PEMESANAN FROM PEMESANAN ORDER BY ID_PEMESANAN DESC LIMIT 1";
		$query = $this->db->query($sql);
		$hasil = $query->row();
		return $hasil;
	}

	public function get_pending_transaction() {
		$sql = "SELECT STATUS FROM V_PEMESANAN WHERE STATUS =  'PENDING'";
		$query = $this->db->query($sql);
		$hasil = $query->num_rows();
		return $hasil;
	}

	public function get_all_pemesanan() {
		$sql = "SELECT * FROM V_PEMESANAN";
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		return $hasil;
	}

	public function get_all_pending_transaction() {
		$sql = "SELECT * FROM V_PEMESANAN WHERE STATUS = 'PENDING'";
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		return $hasil;
	}

	public function get_detail_pembayaran($id_pembayaran)	 {
		$sql = "
		SELECT 
		PEMBAYARAN.KODE_PEMESANAN,
		PEMBAYARAN.ID_PEMESANAN,
		PEMBAYARAN.ATAS_NAMA,
		PEMBAYARAN.TANGGAL_TRANSFER,
		PEMBAYARAN.KODE_PEMBAYARAN,
		PEMBAYARAN.ID_PEMBAYARAN,
		PEMBAYARAN.BANK_PENGIRIM,
		PEMBAYARAN.NOMINAL_TRANSFER,
		PEMBAYARAN.PATH,
		PEMBAYARAN.IMG_NAME,
		PEMESANAN.USERNAME,
		GEDUNG.HARGA_SEWA,
		COALESCE(CATERING.HARGA * PEMESANAN.JUMLAH_CATERING, 0) AS HARGA_CATERING,
		GEDUNG.HARGA_SEWA + (COALESCE(CATERING.HARGA * PEMESANAN.JUMLAH_CATERING, 0)) AS TOTAL
		FROM PEMBAYARAN
		LEFT JOIN PEMESANAN ON PEMBAYARAN.ID_PEMESANAN = PEMESANAN.ID_PEMESANAN
		LEFT JOIN CATERING ON CATERING.ID_CATERING = PEMESANAN.ID_CATERING
		LEFT JOIN GEDUNG ON GEDUNG.ID_GEDUNG = PEMESANAN.ID_GEDUNG
		WHERE PEMBAYARAN.ID_PEMBAYARAN = $id_pembayaran";
		$query = $this->db->query($sql);
		return $query->row();
	}


	public function user_detail_pembayaran($username) {
		$sql = "
		SELECT 
		PEMBAYARAN.KODE_PEMESANAN,
		PEMBAYARAN.ID_PEMESANAN,
		PEMBAYARAN.ATAS_NAMA,
		PEMBAYARAN.TANGGAL_TRANSFER,
		PEMBAYARAN.KODE_PEMBAYARAN,
		PEMBAYARAN.ID_PEMBAYARAN,
		PEMBAYARAN.BANK_PENGIRIM,
		PEMBAYARAN.NOMINAL_TRANSFER,
		PEMBAYARAN.PATH,
		PEMBAYARAN.IMG_NAME,
		PEMESANAN.USERNAME,
		GEDUNG.HARGA_SEWA,
		COALESCE(CATERING.HARGA * PEMESANAN.JUMLAH_CATERING, 0) AS HARGA_CATERING,
		GEDUNG.HARGA_SEWA + (COALESCE(CATERING.HARGA * PEMESANAN.JUMLAH_CATERING, 0)) AS TOTAL
		FROM PEMBAYARAN
		LEFT JOIN PEMESANAN ON PEMBAYARAN.ID_PEMESANAN = PEMESANAN.ID_PEMESANAN
		LEFT JOIN CATERING ON CATERING.ID_CATERING = PEMESANAN.ID_CATERING
		LEFT JOIN GEDUNG ON GEDUNG.ID_GEDUNG = PEMESANAN.ID_GEDUNG
		WHERE PEMESANAN.USERNAME = '$username'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_pemesanan($username) {
		$sql = "SELECT * FROM V_PEMESANAN WHERE USERNAME = '$username'";
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		return $hasil;
	}

	public function count_pemesanan($username) {
		$sql = "SELECT * FROM PEMESANAN WHERE USERNAME = '$username'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function get_rejected_pemesanan($id_pemesanan) {
		$sql = "select * from pemesanan where id_pemesanan = $id_pemesanan";
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function update_transaksi($id_pemesanan, $data, $remarks) {
		//$sql = "UPDATE pemesanan SET STATUS = $data WHERE ID_PEMESANAN = $id_pemesanan";
		$sql = "
		UPDATE PEMESANAN 
		SET STATUS = $data,
		REMARKS = (
			CASE 
			WHEN STATUS = 1 THEN NULL
			ELSE '$remarks'
			END
		)
		,FLAG = 1
		WHERE ID_PEMESANAN = $id_pemesanan";
		$query = $this->db->query($sql);
		return $query;
	}

	public function get_detail_pesanan($id_pemesanan) {
		$sql = "SELECT * FROM V_PEMESANAN WHERE ID_PEMESANAN = '$id_pemesanan'";
		$query = $this->db->query($sql);
		$hasil = $query->row();
		return $hasil;
	}

	public function cancel_order($id_pemesanan, $data) {
		$this->db->where('ID_PEMESANAN', $id_pemesanan);
		$this->db->update('PEMESANAN', $data);
	}

	public function get_proposal_by_id($id_pemesanan) {
		$sql = "SELECT * FROM pemesanan_details WHERE ID_PEMESANAN = $id_pemesanan";
		$query = $this->db->query($sql);
		$hasil = $query->row();
		return $hasil;
	}

	public function update_user_flag($id_pemesanan) {
		$sql = "UPDATE PEMESANAN SET FLAG = 2 WHERE ID_PEMESANAN = $id_pemesanan";
		$query = $this->db->query($sql);
		return $query;
	}

	public function upload_proposal($data) {
		$this->db->insert('pemesanan_details', $data);
	}

	public function get_last_order() {
		$sql = "select 
		p.ID_PEMESANAN AS ID_PEMESANAN,
		p.USERNAME AS USERNAME,
		p.TANGGAL_PEMESANAN AS TANGGAL_PEMESANAN,
		p.EMAIL AS EMAIL,
		coalesce(p.JUMLAH_CATERING,'Tidak Ada') AS JUMLAH_CATERING,
		coalesce(c.NAMA_PAKET,'Tidak Ada') AS NAMA_PAKET,
		g.NAMA_GEDUNG AS NAMA_GEDUNG,
		c.HARGA AS HARGA_SATUAN,
		coalesce((c.HARGA * p.JUMLAH_CATERING),0) AS TOTAL_HARGA,
		(case p.STATUS when 0 then 'PENDING' when 1 then 'DISETUJUI' when 2 then 'DITOLAK' end) AS STATUS,
		g.HARGA_SEWA AS HARGA_SEWA,(g.HARGA_SEWA + coalesce((c.HARGA * p.JUMLAH_CATERING),0)) AS TOTAL_KESELURUHAN,
		pemesanan_details.DESKRIPSI_ACARA AS DESKRIPSI_ACARA 
		from pemesanan p 
		left join catering c on c.ID_CATERING = p.ID_CATERING 
		left join gedung g on g.ID_GEDUNG = p.ID_GEDUNG 
		left join pemesanan_details on pemesanan_details.ID_PEMESANAN = p.ID_PEMESANAN
		order by id_pemesanan desc
		limit 0,1";
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		return $hasil;
	}

	public function delete_pemesanan($id_pemesanan) {
		$this->db->where('ID_PEMESANAN', $id_pemesanan);
		$this->db->delete('gedung');
	}

	public function get_gedung_name($id_gedung) {
		$sql = "SELECT NAMA_GEDUNG, HARGA_SEWA FROM GEDUNG WHERE ID_GEDUNG = $id_gedung";
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		return $hasil;
	}

	public function insert_gedung_img($data) {
		$this->db->insert('gedung_img', $data);
	}

	public function insert_perawatan($data) {
		$this->db->insert('perawatan', $data);
	}

	public function get_last_id_gedung() {
		$sql = "SELECT MAX(ID_GEDUNG) AS ID_GEDUNG FROM GEDUNG";
		$query = $this->db->query($sql);
		$hasil = $query->row();
		return $hasil;
	}

	public function insert_gedung($data) {
		$this->db->insert('gedung', $data);
	}

	public function update_gedung($id_gedung, $data) {
		$this->db->where('ID_GEDUNG', $id_gedung);
		$this->db->update('gedung', $data);
	}

	public function delete_gedung($id_gedung) {
		$this->db->where('ID_GEDUNG', $id_gedung);
		$this->db->delete('gedung');
	}

	public function get_menu_catering() {
		$sql = "SELECT * FROM CATERING";
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		return $hasil;
	}

	public function sort_by_name() {
		$sql = "SELECT * FROM home_data ORDER BY NAMA_GEDUNG ASC";
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		return $hasil;
	}

	public function sort_by_capacity() {
		$sql = "SELECT * FROM home_data ORDER BY KAPASITAS DESC";
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		return $hasil;
	}

	public function gedung_details($id_gedung) {
		$query = "SELECT ID_GEDUNG, NAMA_GEDUNG, ALAMAT, DESKRIPSI_GEDUNG, KAPASITAS, HARGA_SEWA FROM GEDUNG WHERE ID_GEDUNG = $id_gedung";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	public function search_gedung($nama_gedung) {
		$query = "SELECT ID_GEDUNG, NAMA_GEDUNG, PATH, IMG_NAME FROM home_data WHERE NAMA_GEDUNG LIKE '%$nama_gedung%'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	public function get_gedung_img($id_gedung) {
		$query = "SELECT ID_GEDUNG, PATH, IMG_NAME FROM GEDUNG_IMG WHERE ID_GEDUNG = $id_gedung";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
}
