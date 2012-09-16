<?php 

	require_once('application/libraries/classes/Address.php');
	require_once('application/libraries/classes/People.php');
	require_once('application/libraries/classes/Businesses.php');
	require_once('application/libraries/classes/People_To_Businesses.php');

	class Contact_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get($id=null){
			if($id){
				$this->db->where('ID', $id);
			}

			$this->db->select('*');
			$this->db->from('people');
			$this->db->order_by('name', 'asc');

			$query = $this->db->get();

			return $query->result_array();
		}

		public function insert_contact() {
			$member = new People_Class();
			$business = new Business_Class();
			if(!empty($_POST['address']['Address_Line_1'])){
				$address = new Address_Class();
				$address->setAddressLine1($_POST['address']['Address_Line_1']);
				$address->setAddressLine2($_POST['address']['Address_Line_2']);
				$address->setAddressLine3($_POST['address']['Address_Line_3']);
				$address->setCity($_POST['address']['City']);
				$address->setPostcode($_POST['address']['Postcode']);
				$address->save();
			}

			$bid = $_POST['business']['Current'];

			if($bid == ''){
				if(isset($address)){
					$aid = $address->getID();
				} else {
					$aid = 0;
				}
				$business->setAddressID($aid);
				$business->setName($_POST['business']['Name']);
				$business->setPhone($_POST['business']['Phone']);
				$business->setEmail($_POST['business']['Email']);
				$business->save();
				$bid = $business->getID();
			}

			$member->setName($_POST['contact']['Name']);
			$member->setRole($_POST['contact']['Role']);
			$member->setEmail($_POST['contact']['Email']);
			$member->setPhone($_POST['contact']['Phone']);
			$member->setNotes($_POST['contact']['Notes']);
			$member->setBusinessID($bid);
			$member->save();
			return true;
		}

		public function update_contact($id){
			$member = new People_Class($id);
			$member->setName($_POST['contact']['Name']);
			$member->setRole($_POST['contact']['Role']);
			$member->setEmail($_POST['contact']['Email']);
			$member->setPhone($_POST['contact']['Phone']);
			$member->setNotes($_POST['contact']['Notes']);
			$member->save();
			return true;
		}

		public function delete_contact($id){
			$contact = new People_Class($id);
			$contact->MarkForDeletion();
		}

		public function edit_contact($id){
			// $contact = new Contact_Class($id);
			// $address = new Address_Class($contact->getAddressID());
		}

		public function search_contact($data){
			// Do a sql statement here to search the contacts.
			$sql = "SELECT people_id, name, email, phone 
FROM people
where name like '%{$data}%'
or email like '%{$data}%'
or phone like '%{$data}%'
or people_id like '%{$data}%'
order by name asc";
			$query = $this->db->query($sql);
			return json_encode($query->result_array());
		}

		public function contact_deatils($id){
			$sql = "select p.*, b.name as business_name from people as p
left join businesses as b on b.business_id = p.business_id
where people_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row();
		}
	}
?>