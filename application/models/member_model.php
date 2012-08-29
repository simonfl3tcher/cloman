<?php 

	require_once('application/libraries/classes/Address.php');
	require_once('application/libraries/classes/Member.php');
	
	class Member_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get_countries(){
			$this->db->select('Country_ID, Country');
			$query = $this->db->get_where('countries', array('Allow_Sales' => 'Y'));
			return $query->result_array();
		}

		public function insert_member() {
			$member = new Member_Class();
			$address = new Address_Class();
			$address->setAddressLine1($_POST['address']['Address_Line_1']);
			$address->setAddressLine2($_POST['address']['Address_Line_2']);
			$address->setAddressLine3($_POST['address']['Address_Line_3']);
			$address->setCity($_POST['address']['City']);
			$address->setRegion($_POST['address']['County']);
			$address->setCountryID($_POST['address']['Country']);
			$address->setPostcode($_POST['address']['Postcode']);
			if($address->save()){
				$member->setTitle($_POST['contact']['Title']);
				$member->setFirstName($_POST['contact']['Name_First']);
				$member->setLastName($_POST['contact']['Name_Last']);
				$member->setAddressId($address->getID());
				$member->setEmailAddress($_POST['contact']['Email']);
				$member->setUrl($_POST['contact']['Url']);
				$member->setDisplayName($_POST['contact']['Display_Name']);
				$member->setPassword(encryption_hard($_POST['password']));
				$member->setDateAccountCreated(date("Y-m-d"));
			}
			$member->save();
		}

		public function login(){
			$this->db->where('Member_Password = ', encryption_hard($_POST['password']));
			$this->db->where('Member_Email = ', $_POST['contact']['Email']);
			$this->db->or_where('Display_Name = ', $_POST['contact']['Email']);
			return $this->db->get('members');
		}
	}
?>