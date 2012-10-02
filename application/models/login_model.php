<?php 
	
	class Login_Model extends CI_Model {

		public function login(){
			$this->db->where('password = ', encryption_hard($_POST['password']));
			$this->db->where('email = ', $_POST['contact']['Email']);
			$query = $this->db->get('users');
			return $query->row();
		}

		public function set_login($id){
			$data = array('is_logged_in' => 'Y');
			$this->db->where('user_id', $id);
			$this->db->update('users', $data);
			return true;
		}

		public function set_logout($id){
			$data = array('is_logged_in' => 'N');
			$this->db->where('user_id', $id);
			$this->db->update('users', $data);
			return true;
		}

	}
?>