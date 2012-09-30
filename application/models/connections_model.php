<?php 

	require_once('application/libraries/classes/Connections.php');
	require_once('application/libraries/classes/Connection_Options.php');
	
	class Connections_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get_connection_types() {
			$this->db->select('*');
			$this->db->from('connection_options');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function insert_connection(){
			// if new type is not blank then you need to add that in and then save it against that ID
			if($_POST['connection']['Add_type_of_connection'] !== ''){
				$o = new Connection_Options_Class();
				$o->setName($_POST['connection']['Add_type_of_connection']);
				$o->save();
				$option = $o->getID();
			} else {
				$option = $_POST['connection']['Type_of_connection'];
			}
			$con = new Connections_Class();
			$con->setConnectionOptionsID($option);
			$con->setBusinessID($_POST['connection']['Business']);
			$con->setUsername($_POST['connection']['Username']);
			$con->setUsernameTwo($_POST['connection']['Username_2']);
			$con->setPassword($_POST['connection']['Password']);
			$con->setUrl($_POST['connection']['Link']);
			$con->save();
		}

		public function update_connection($id){
			$con = new Connections_Class($id);
			$con->setConnectionOptionsID($_POST['connection']['Type_of_connection']);
			$con->setBusinessID($_POST['connection']['Business']);
			$con->setUsername($_POST['connection']['Username']);
			$con->setUsernameTwo($_POST['connection']['Username_2']);
			$con->setPassword($_POST['connection']['Password']);
			$con->setUrl($_POST['connection']['Link']);
			$con->save();
			return true;
		}

		public function get(){
			$sql = "SELECT c.*, b.name from connections as c
left join businesses as b on b.business_id = c.connection_id
where b.disabled = 'N' and c.disabled = 'N'
order by b.name, c.url asc";
			$query = $this->db->query($sql);

			return $query->result_array();
		}

		public function search_connections($data){
			$sql = "SELECT c.*, b.name from connections as c
inner join businesses as b on b.business_id = c.business_id
where b.disabled = 'N' and c.disabled = 'N'
and (url like '%{$data}%' or name like '%{$data}%')
order by b.name, c.url";
			$query = $this->db->query($sql);
			return $query->result_array();

		}

		public function disable_connection($id){
			$contact = new Connections_Class($id);
			$contact->setDisabled('Y');
			$contact->save();
		}

		public function advanced_search(){
			$con = $_POST["search"]['containing'];
			$sql = "SELECT c.*, b.name from connections as c
left join businesses as b on b.business_id = c.business_id
where (c.business_id = ? and c.connection_options_id = ?)
and b.disabled = 'N' and c.disabled = 'N'
and(c.username like '%{$con}%' or c.username_two like '%{$con}%' or url like '%{$con}%')
order by b.name, c.url asc";
			$query = $this->db->query($sql, array($_POST["search"]['Business'], $_POST["search"]['Type_of_connection']));
			return $query->result_array();
		}

		public function connections_businesses($id, $json = false){
			if($json){
				$select = "SELECT b.business_id as id, b.name";
			} else {
				$select = "SELECT *";
			}
			$sql = $select . " from businesses as b
inner join connections as c on c.business_id = b.business_id
where c.connection_id = ?";
			$query = $this->db->query($sql, array($id));
			if(!$json){
				return $query->result_array();
			} else {
				return json_encode($query->result_array());
			}
		}
	}
?>