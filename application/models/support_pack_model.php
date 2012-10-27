<?php 
	
	class Support_Pack_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get_avalible_support_packs(){
			$this->db->select('*');
			$this->db->from('support_packs');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function add_support_pack(){
			$data = array(
				'name' => $_POST['support']['Name'],
				'price' => $_POST['support']['Price'],
				'description' => $_POST['support']['Description'],
				'includes' => $_POST['support']['Includes'],
				'time_allowed_pm' => time_to_sec($_POST['support']['Time'])
			);

			$this->db->insert('support_packs', $data);
			return true; 

		}

		public function support_details($id){
			$this->db->select('*');
			$this->db->from('support_packs');
			$this->db->where('support_packs_id', $id);
			$query = $this->db->get();
			return $query->row();
		}
	}
?>