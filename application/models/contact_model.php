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
			$query = $this->db->get('people');
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

			$member->setName($_POST['contact']['Name']);
			$member->setRole($_POST['contact']['Role']);
			$member->setEmail($_POST['contact']['Email']);
			$member->setPhone($_POST['contact']['Phone']);
			$member->setBusinessID($business->getID());
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
or people_id like '%{$data}%'";

			$query = $this->db->query($sql);
			echo json_encode($query->result_array());
		}
	}
?>