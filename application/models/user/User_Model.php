<?php
/**
* 
*/
class User_Model extends CI_Model {

	function insert($data) {
		$this->db->insert('user', $data);
	}

	function update_data($user, $data) {
		$this->db->where('username', $user);
		$this->db->update('user', $data);
	}

	function get_all_users() {
		$query = "SELECT * FROM USER";
		$sql = $this->db->query($query);
		$hasil = $sql->result_array();
		return $hasil;
	}

}