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

		public function get_client_login_against_project($projectId){
			$sql = "SELECT p.* from people as p
inner join business_to_people as btp on btp.people_id = p.people_id
inner join projects as pro on pro.business_id = btp.business_id
where p.has_login_access = 'Y' and p.password is not null and pro.project_id = ?
limit 1";
			$query = $this->db->query($sql, $projectId);
			return $query->row();
		}

		public function set_client_logout($id){
			$data = array('is_logged_in' => 'N');
			$this->db->where('people_id', $id);
			$this->db->update('people', $data);
			return true;
		}

		public function set_client_login_for_admin($id){

		}

	}
?>