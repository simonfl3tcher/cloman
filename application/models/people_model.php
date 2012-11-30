<?php 

	require_once('application/libraries/classes/Address.php');
	require_once('application/libraries/classes/People.php');
	require_once('application/libraries/classes/Businesses.php');

	class People_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get($id=null){
			if($id){
				$this->db->where('people_id', $id);
				$query = $this->db->get('people');
				return $query->row_array();
			}
			$query = $this->db->get('people');
			return $query->result_array();
		}

		public function insert_person() {
			$member = new People_CLass();
			$business = new Business_Class();
			if(!empty($_POST['address']['Address_Line_1'])){
				$address = new Address_Class();
				$address->setAddressLine1($_POST['address']['Address_Line_1']);
				$address->setAddressLine2($_POST['address']['Address_Line_2']);
				$address->setAddressLine3($_POST['address']['Address_Line_3']);
				$address->setCity($_POST['address']['City']);
				$address->setRegion($_POST['address']['County']);
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

		public function delete_person($id){
			$contact = new People_Class($id);
			$contact->MarkForDeletion();
		}

		public function get_faqs(){
			$this->db->select('*');
			$this->db->from('faq');
			$this->db->where('verified', 'Y');
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>