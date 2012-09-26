<?php 
	require_once('application/libraries/classes/Address.php');
	require_once('application/libraries/classes/Businesses.php');
	require_once('application/libraries/classes/People.php');

	class Business_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get($id=null){
			if($id){
				$this->db->where('ID', $id);
			}

			$this->db->select('*');
			$this->db->from('businesses');
			$this->db->order_by('name', 'asc');
			$this->db->where('disabled', 'N');

			$query = $this->db->get();

			return $query->result_array();
		}

		public function search_business($data) {
			$sql = "SELECT * from businesses where disabled = 'N' and (name like '%{$data}%'
or email like '%{$data}%'
or phone like '%{$data}%'
or business_id like '%{$data}%')
order by name asc";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function disable_business($id){
			$contact = new Business_Class($id);
			$contact->setDisabled('Y');
			$contact->save();
		}

		public function insert_business(){
			// fix get id function from business and people
			$business = new Business_Class();
			$member = new People_Class();
			if(!empty($_POST['address']['Address_Line_1'])){
				$address = new Address_Class();
				$address->setAddressLine1($_POST['address']['Address_Line_1']);
				$address->setAddressLine2($_POST['address']['Address_Line_2']);
				$address->setAddressLine3($_POST['address']['Address_Line_3']);
				$address->setCity($_POST['address']['City']);
				$address->setRegion($_POST['address']['Region']);
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
			$bid = $business->getID();


			$mem = explode(',', $_POST['contact']['Current']);

			if(empty($_POST['contact']['Current']) && $_POST['contact']['Name'] !== ''){

				$member->setName($_POST['contact']['Name']);
				$member->setRole($_POST['contact']['Role']);
				$member->setEmail($_POST['contact']['Email']);
				$member->setPhone($_POST['contact']['Phone']);
				$member->setNotes($_POST['contact']['Notes']);
				$member->save();

				$mem = array($member->getID());
			}

			self::insert_relational($bid, $mem);

			return true;
		}

		public function update_business($id) {
			$business= new Business_Class($id);
			if($business->getAddressID() != 0){
				$address = new Address_Class($business->getAddressID());
			} else {
				$address = new Address_Class();
			}

			$address->setAddressLine1($_POST['address']['Address_Line_1']);
			$address->setAddressLine2($_POST['address']['Address_Line_2']);
			$address->setAddressLine3($_POST['address']['Address_Line_3']);
			$address->setRegion($_POST['address']['Region']);
			$address->setCity($_POST['address']['City']);
			$address->setPostcode($_POST['address']['Postcode']);
			$address->save();

			$business->setAddressID($address->getID());
			$business->setName($_POST['business']['Name']);
			$business->setEmail($_POST['business']['Email']);
			$business->setPhone($_POST['business']['Phone']);
			$business->save();
			$bid = $business->getID();

			$mem = explode(',', $_POST['contact']['Current']);
			self::insert_relational($bid, $mem);
			return true;
		}

		public function search_business_token($data){
			$sql = "SELECT business_id as id, name from businesses where name like '%{$data}%' and disabled = 'N'";
			$query = $this->db->query($sql);
			return json_encode($query->result_array());
		}

		public function insert_relational($bid=null, $mem = array(), $delete = true){
			if($delete){
				$this->db->delete('business_to_people', array('business_id' => $bid)); 
			}
			foreach($mem as $m){
				$sql = "INSERT INTO business_to_people (business_id, people_id)
VALUES (?, ?)";
				$query = $this->db->query($sql, array($bid, $m));
			}
			return true;
		}

		public function business_details($id){
			$sql = "SELECT * FROM businesses as b 
left join address as a on a.Address_ID = b.address_id
WHERE b.business_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row();
		}

		public function businesses_contact($id){
			$sql = "SELECT p.people_id as id, p.name from people as p
left join business_to_people as bp on bp.people_id = p.people_id
where bp.business_id = ?";
			$query = $this->db->query($sql, array($id));
			return json_encode($query->result_array());
		}

		public function contact_details($id){
			$sql = "SELECT * from people as p
left join business_to_people as bp on bp.people_id = p.people_id
where bp.business_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}
	}
?>