<?php

/**
* 
*/
class Pembayaran_Model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	function insert_pembayaran($data) {
		$this->db->insert('pembayaran', $data);
	}
}