<?php 
	

	class Management_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get($id = null){
			$this->db->select('*');
			$this->db->from('users');
			if($id != null){
				$this->db->where('user_id', $id);
			}
			$query = $this->db->get();
			return $query->result_array();
		}

		public function update_users_color(){
			foreach($_POST as $key => $value){
				$data = array(
					'color' => $value['color']
				);
				$this->db->where('user_id', $key);
				$this->db->update('users', $data);
			}
		}

		public function add_employee(){
			$data = array(
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'display_name' => $_POST['displayName'],
				'password' => encryption_hard($_POST['password']),
				'color' => $_POST['color']
			);
			$this->db->insert('users', $data);
		}
	}

?>
