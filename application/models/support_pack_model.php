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

		public function search_support_packs($search){
			$sql = "SELECT *, sp.name as support_name from support_packs_to_businesses as sptb
inner join support_packs as sp on sp.`support_packs_id` = sptb.`support_pack_id`
inner join businesses as b on b.`business_id` = sptb.`business_id`
where sptb.is_live = 'Y' and (b.name like '%{$search}%' or sp.name like '%{$search}%')
order by b.name";
			$query = $this->db->query($sql);
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

		public function support_businesses($id){
			$sql = "SELECT b.name from support_packs as sp
inner join support_packs_to_businesses as sptb on sptb.`support_pack_id` = sp.`support_packs_id`
inner join businesses as b on b.`business_id` = sptb.`business_id`
where sp.support_packs_id = ?";
			$query = $this->db->query($sql, $id);
			return $query->result_array();
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
				'renewal_date' => date('Y-m-d H:i:s', strtotime('+1 year')),
				'notes' => $_POST['notes'],
				'task_per_month' => date('Y-m-d H:i:s', strtotime($_POST['date'])),
				'recursive' => $_POST['recurring']
			);
			$this->db->insert('support_packs_to_businesses', $data);

			return $this->get_support_packs_for_business($business_id); 
		}

		public function get_support_packs_for_business($id){
			$sql = "SELECT sp.`name` from `support_packs_to_businesses` as s
inner join support_packs as sp on sp.`support_packs_id` = s.`support_pack_id`
where business_id = ? and s.is_live = 'Y'";
			$query = $this->db->query($sql, $id);
			return $query->result_array();
		}

		public function get_list_of_businesses(){
			$sql = "SELECT *, sp.name as support_name from support_packs_to_businesses as sptb
inner join support_packs as sp on sp.`support_packs_id` = sptb.`support_pack_id`
inner join businesses as b on b.`business_id` = sptb.`business_id`
where sptb.is_live = 'Y'
order by b.name";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function disable($id){
			$data = array(
				'is_live' => 'N'
			);
			$this->db->where('sptb_id', $id);
			$this->db->update('support_packs_to_businesses', $data);
			return true;
		}

		public function renew($id){
			// You need to get the tme and update it by a year.
			$this->db->select('renewal_date');
			$this->db->from('support_packs_to_businesses');
			$this->db->where('sptb_id', $id);
			$query = $this->db->get();
			$query = $query->row();
			$data = array(
				'renewal_date' => date('Y-m-d H:i:s', strtotime('+1 year', strtotime($query->renewal_date)))
			);
			$this->db->where('sptb_id', $id);
			$this->db->update('support_packs_to_businesses', $data);
			return true;
		}
	}
?>