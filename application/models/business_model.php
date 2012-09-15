<?php 

	require_once('application/libraries/classes/Businesses.php');

	class Business_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get($id=null){
			if($id){
				$this->db->where('ID', $id);
			}

			$this->db->select('*');
			$this->db->from('businesses');
			$this->db->order_by('name', 'asc');

			$query = $this->db->get();

			return $query->result_array();
		}
	}
?>