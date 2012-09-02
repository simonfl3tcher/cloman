<?php 
	
	class Login_Model extends CI_Model {

		public function login(){
			$this->db->where('Contact_Password = ', encryption_hard($_POST['password']));
			$this->db->where('Contact_Level = ', 1);
			$this->db->where('Contact_Email = ', $_POST['contact']['Email']);
			$this->db->or_where('Display_Name = ', $_POST['contact']['Email']);
			return $this->db->get('contacts');
		}

	}
?>