<?php 
	
	class Login_Model extends CI_Model {

		public function login(){
			$this->db->where('User_Password = ', encryption_hard($_POST['password']));
			$this->db->where('User_level = ', 1);
			$this->db->where('User_Email = ', $_POST['contact']['Email']);
			$this->db->or_where('Display_Name = ', $_POST['contact']['Email']);
			return $this->db->get('users');
		}

	}
?>