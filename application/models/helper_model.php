<?php 
	
	class Helper_Model extends CI_Model {

		public function get_countries(){
			$this->db->select('Country_ID, Country');
			$query = $this->db->get_where('countries', array('Allow_Sales' => 'Y'));
			return $query->result_array();
		}
	}
?>