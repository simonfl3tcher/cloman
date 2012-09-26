<?php 

	require_once('application/libraries/classes/Connections.php');
	require_once('application/libraries/classes/Connection_Options.php');
	
	class Connections_Model extends CI_Model {

		public function __constructor(){
			parent::__constructor();
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
left join businesses as b on b.business_id = c.connection_id
where b.disabled = 'N' and (url like '%{$data}%' or name like '%{$data}%') and c.disabled = 'N'
order by b.name, c.url asc";
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
left join businesses as b on b.business_id = c.connection_id
where (c.business_id = ? and c.connection_options_id = ?) 
and c.disabled = 'N'
and (username like '%{$con}%' or username_two like '%{$con}%' or url like '%{$con}%')
order by b.name, c.url asc";
			$query = $this->db->query($sql, array($_POST["search"]['Business'], $_POST["search"]['Type_of_connection']));
			return $query->result_array();
		}
	}
?>