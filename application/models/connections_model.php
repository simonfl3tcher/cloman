<?php 
	
	class Connections_Model extends CI_Model {

		public function __constructor(){
			parent::__constructor();
		}

		public function get_connection_types() {
			$this->db->select('*');
			$this->db->from('connection_options');
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>