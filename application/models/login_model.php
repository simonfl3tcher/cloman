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

		public function client_login(){
			$this->db->where('password = ', encryption_hard($_POST['password']));
			$this->db->where('email = ', $_POST['email']);
			$this->db->where('has_login_access', 'Y');
			$query = $this->db->get('people');
			return $query->row();
		}

		public function set_client_login($id){
			$data = array('is_logged_in' => 'Y');
			$this->db->where('people_id', $id);
			$this->db->update('people', $data);
			return true;
		}

		public function client_login_for_admin(){
			// log in here.
		}

		public function set_client_logout($id){
			$data = array('is_logged_in' => 'N');
			$this->db->where('people_id', $id);
			$this->db->update('people', $data);
			return true;
		}

	}
?>