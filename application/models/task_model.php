<?php 

	require_once('application/libraries/classes/Tasks.php');
	require_once('application/libraries/classes/Tasks_To_Users.php');
	require_once('application/libraries/classes/Task_Type.php');
	
	class Task_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get($id = null){
			$sql = "SELECT b.name as business_name, b.business_id as bid, tt.name as task_type, t.*, u.name as created_by from tasks as t
inner join businesses as b on b.business_id = t.business_id
inner join status_table as st on st.status_id = t.status_id
inner join task_type as tt on tt.task_type_id = t.task_type_id
inner join users as u on u.user_id = t.task_created_by
where complete = 'N'";
		if($id != null){
			$sql .= " and t.task_id = {$id}";
		}
		$sql .= " order by t.status_id";
			$query = $this->db->query($sql);
			return $query->row();
		}

		public function search_tasks($data) {
			$sql = "SELECT b.name as business_name, t.* from tasks as t
inner join businesses as b on b.business_id = t.business_id
inner join status_table as st on st.status_id = t.status_id
where t.complete = 'N' and (b.name like '%{$data}%' or t.status_id like '%{$data}%' or t.name like '%{$data}%')
order by t.status_id";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_users_tasks($id = null){
			$sql = "SELECT b.name as business_name, t.* from tasks as t
inner join businesses as b on b.business_id = t.business_id
inner join status_table as st on st.status_id = t.status_id
inner join tasks_to_users as ttu on ttu.task_id = t.task_id
where t.complete = 'N' and ttu.user_id = {$id}
order by t.status_id";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_task_types(){
			$this->db->select('*');
			$this->db->from('task_type');
			$query = $this->db->get();
			return $query->result_array();	
		}

		public function insert_task(){
			if($_POST['task']['Add_type_of_task'] !== ''){
				$t = new Task_Type_Class();
				$t->setName($_POST['task']['Add_type_of_task']);
				$t->save();
				$type = $t->getID();
			} else {
				$type = $_POST['task']['Type'];
			}
			$task = new Tasks_Class();
			$task->setName($_POST['task']['Name']);
			$task->setBusinessID($_POST['task']['Business']);
			$task->setStartDate(date('Y-m-d', strtotime($_POST['task']['Startdate'])));
			$task->setInternalDeadline(date('Y-m-d', strtotime($_POST['task']['internal-end-date'])));
			$task->setClientDeadline(date('Y-m-d', strtotime($_POST['task']['external-end-date'])));
			$task->setNotes($_POST['task']['Notes']);
			$task->setTaskTypeID($type);
			if(isset($_POST['task']['Project'])){
				$task->setProjectID($_POST['task']['Project']);
			}
			$task->setStatusID($_POST['task']['Status']);
			$task->setCreatedBy($this->session->userdata('user_id'));
			$task->save();

			$workers = explode(',', $_POST['task']['Workers']);

			foreach($workers as $w){
				$projectUsers = new Tasks_To_Users_Class();
				$projectUsers->setTaskID($task->getID());
				$projectUsers->setUserID($w);
				$projectUsers->save();
			}
			return true;
		}

		public function get_project_for_business($id){
			$this->db->select('project_id, project_name');
			$this->db->from('projects');
			$this->db->where('business_id', $id);
			$query = $this->db->get();
			return json_encode($query->result_array());
		}

		public function worker_details($id){
			$sql = "SELECT u.* from tasks_to_users as ttu
inner join users as u on u.user_id = ttu.user_id
where task_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}

		public function complete_task($id){
			$data = array('complete' => 'Y');
			$this->db->where('task_id', $id);
			$this->db->update('tasks', $data);
			return true;
		}
	}
?>