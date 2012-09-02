<?php 

	require_once('application/libraries/classes/Address.php');
	require_once('application/libraries/classes/Contact.php');
	
	class Contact_Model extends CI_Model {

		public function get($id=null){
			if($id){
				$this->db->where('ID', $id);
			}
			$query = $this->db->get('contacts');
			return $query->result_array();
		}

		public function insert_contact() {
			$member = new Contact_Class();
			$address = new Address_Class();
			if(!empty($_POST['address']['Address_Line_1'])){
				$address->setAddressLine1($_POST['address']['Address_Line_1']);
				$address->setAddressLine2($_POST['address']['Address_Line_2']);
				$address->setAddressLine3($_POST['address']['Address_Line_3']);
				$address->setCity($_POST['address']['City']);
				$address->setRegion($_POST['address']['County']);
				$address->setCountryID($_POST['address']['Country']);
				$address->setPostcode($_POST['address']['Postcode']);
			}
			$member->setFirstName($_POST['contact']['Name_First']);
			$member->setLastName($_POST['contact']['Name_Last']);
			if($address->getID()){
				$aid = $address->getID();
			} else {
				$aid = 0;
			}
			$member->setAddressId($aid);
			$member->setEmailAddress($_POST['contact']['Email']);
			$member->setUrl($_POST['contact']['Url']);
			$member->setDisplayName($_POST['contact']['Display_Name']);
			$member->setPassword(encryption_hard($_POST['password']));
			$member->setDateAccountCreated(date("Y-m-d"));
			$member->save();
			return true;
		}
	}
?>