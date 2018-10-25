<?php
/**
* 
*/
class Catering_Model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	function get_catering_name() {
		$sql = "SELECT ID_CATERING, NAMA_PAKET FROM CATERING";
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		return $hasil;
	}

	function get_all() {
		$sql = "SELECT * FROM CATERING";
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		return $hasil;
	}

	function add_catering($data) {
		$this->db->insert('catering', $data);
	}
}