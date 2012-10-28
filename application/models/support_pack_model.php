<?php 
	
	class Support_Pack_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get_avalible_support_packs($id = null){
			$this->db->select('*');
			$this->db->from('support_packs');
			if($id != null){
				$this->db->where('support_packs_id', $id);
				$query = $this->db->get();
				return $query->row();
			} else {
				$query = $this->db->get();
				return $query->result_array();
			}
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

		public function update_support_pack($id){
			$data = array(
				'name' => $_POST['support']['Name'],
				'price' => $_POST['support']['Price'],
				'description' => $_POST['support']['Description'],
				'includes' => $_POST['support']['Includes'],
				'time_allowed_pm' => time_to_sec($_POST['support']['Time'])
			);
			$this->db->where('support_packs_id', $id);
			$this->db->update('support_packs', $data); 
			return true;
		}

		public function add_support_pack_to_business($business_id, $support_pack){
			$data = array(
				'business_id' => $business_id, 
				'support_pack_id' => $support_pack,
				'renewal_date' => date('Y-m-d H:i:s', strtotime('+1 year'))
			);
			$this->db->insert('support_packs_to_businesses', $data);
		}
	}
?>