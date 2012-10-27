<?php 
	
	class Support_Pack_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get_avalible_support_packs(){
			$this->db->select('*');
			$this->db->from('support_packs');
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>