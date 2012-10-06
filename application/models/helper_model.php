<?php 
	
	class Helper_Model extends CI_Model {

		public function get_users(){
			$this->db->select('*');
			$this->db->from('users');
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>