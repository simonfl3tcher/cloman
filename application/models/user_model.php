<?php 
	
	class User_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get($id= null){
			$this->db->select('*');
			$this->db->from('users');
			if($id != null){
				$this->db->where('user_id', $id);
			}
			$query = $this->db->get();
			return $query->result_array();
		}
	}