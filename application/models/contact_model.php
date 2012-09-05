<?php 

	require_once('application/libraries/classes/Address.php');
	require_once('application/libraries/classes/Contact.php');
	
	class Contact_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get($id=null){
			if($id){
				$this->db->where('ID', $id);
			}
			$query = $this->db->get('contacts');
			return $query->result_array();
		}

		public function insert_contact() {
			$member = new Contact_Class();
			if(!empty($_POST['address']['Address_Line_1'])){
				$address = new Address_Class();
				$address->setAddressLine1($_POST['address']['Address_Line_1']);
				$address->setAddressLine2($_POST['address']['Address_Line_2']);
				$address->setAddressLine3($_POST['address']['Address_Line_3']);
				$address->setCity($_POST['address']['City']);
				$address->setRegion($_POST['address']['County']);
				$address->setCountryID($_POST['address']['Country']);
				$address->setPostcode($_POST['address']['Postcode']);
				$address->save();
			}
			$member->setFirstName($_POST['contact']['Name_First']);
			$member->setLastName($_POST['contact']['Name_Last']);
			if(isset($address)){
				$aid = $address->getID();
			} else {
				$aid = 0;
			}
			$member->setAddressId($aid);
			$member->setEmailAddress($_POST['contact']['Email']);
			$member->setUrl($_POST['contact']['Url']);
			$member->setDisplayName($_POST['contact']['Display_Name']);
			$member->setNotes($_POST['contact']['Notes']);
			$member->setPassword(encryption_hard($_POST['password']));
			$member->setDateAccountCreated(date("Y-m-d"));
			if(isset($_POST['admin'])){
				$member->setLevel(1);
			} 
			$member->save();
			return true;
		}

		public function deleteContact($id){
			$contact = new Contact_Class($id);
			$contact->MarkForDeletion();
		}

		public function editContact($id){
			$contact = new Contact_Class($id);
			$address = new Address_Class($contact->getAddressID());
		}
	}
?>