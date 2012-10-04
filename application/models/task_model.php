<?php 
	
	class Task_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get_task_types(){
			$this->db->select('*');
			$this->db->from('task_types');
			$query = $this->db->get();
			return $query->result_array();	
		}

		public function insert_task(){
			var_dump('You are inserting the task');
			exit;
		}
	}
?>