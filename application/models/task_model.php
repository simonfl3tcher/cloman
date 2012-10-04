<?php 

	require_once('application/libraries/classes/Tasks.php');
	require_once('application/libraries/classes/Tasks_To_Users.php');
	require_once('application/libraries/classes/Task_Type.php');
	
	class Task_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
			$this->load->database();
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
			var_dump($type);
			exit;
			$task = new Tasks_Class();
			$task->setName($_POST['task']['Name']);
			$task->setBusinessID($_POST['task']['Business']);
			$task->setStartDate(date('Y-m-d', strtotime($_POST['task']['Startdate'])));
			$task->setInternalDeadline(date('Y-m-d', strtotime($_POST['task']['internal-end-date'])));
			$task->setClientDeadline(date('Y-m-d', strtotime($_POST['task']['external-end-date'])));
			$task->setNotes($_POST['task']['Notes']);
			$task->setTaskTypeID($type);
			$task->setStatusID($_POST['task']['Status']);
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
	}
?>