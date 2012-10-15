<?php 

	require_once('application/libraries/classes/Tasks.php');
	require_once('application/libraries/classes/Tasks_To_Users.php');
	require_once('application/libraries/classes/Task_Type.php');
	
	class Task_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->model('Nested_Sets_Model');
		}

		public function get($id = null){
			$sql = "SELECT b.name as business_name, b.business_id as bid, tt.name as task_type, t.*, u.name as created_by from tasks as t
left join businesses as b on b.business_id = t.business_id
left join status_table as st on st.status_id = t.status_id
left join task_type as tt on tt.task_type_id = t.task_type_id
inner join users as u on u.user_id = t.task_created_by";
			if($id != null){
				$sql .= " and t.task_id = {$id}";
				$query = $this->db->query($sql);
				return $query->row();
			} else {
				$sql .= " where complete = 'N' order by t.sort asc";
				$query = $this->db->query($sql);
				return $query->result_array();
			}
		}

		public function get_archived_tasks(){
			$sql = "SELECT b.name as business_name, b.business_id as bid, tt.name as task_type, t.*, u.name as created_by from tasks as t
left join businesses as b on b.business_id = t.business_id
left join status_table as st on st.status_id = t.status_id
left join task_type as tt on tt.task_type_id = t.task_type_id
left join users as u on u.user_id = t.task_created_by
where complete = 'Y'
order by t.actual_completion_date desc, t.task_id desc ";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_subtasks($id){
			$this->db->select('*');
			$this->db->from('tasks');
			$this->db->where('parent_task_id', $id);
			$this->db->where('complete', 'N');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function search_tasks($data, $archive) {
			$sql = "SELECT b.name as business_name, t.* from tasks as t
left join businesses as b on b.business_id = t.business_id
left join status_table as st on st.status_id = t.status_id";
			if($archive !=null){
				$sql .=" where t.complete = 'Y' and (b.name like '%{$data}%' or t.status_id like '%{$data}%' or t.name like '%{$data}%')
			order by t.actual_completion_date desc, t.task_id desc ";
			} else {
				$sql .=" where t.complete = 'N' and (b.name like '%{$data}%' or t.status_id like '%{$data}%' or t.name like '%{$data}%')
			order by t.sort asc";
			}
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_users_tasks($id = null){
			$sql = "SELECT b.name as business_name, t.*, ttu.sort from tasks as t
left join businesses as b on b.business_id = t.business_id
left join status_table as st on st.status_id = t.status_id
inner join tasks_to_users as ttu on ttu.task_id = t.task_id
where t.complete = 'N' and ttu.user_id = {$id}
order by ttu.sort";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function get_users_archived_tasks($id){
			$sql = "SELECT b.name as business_name, b.business_id as bid, tt.name as task_type, t.*, u.name as created_by from tasks as t
left join businesses as b on b.business_id = t.business_id
left join status_table as st on st.status_id = t.status_id
left join task_type as tt on tt.task_type_id = t.task_type_id
inner join tasks_to_users as ttu on ttu.task_id = t.task_id
left join users as u on u.user_id = t.task_created_by
where complete = 'Y' and ttu.user_id = {$id}
order by t.actual_completion_date desc, t.task_id desc";
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

			$nested_task = $this->Nested_Sets_Model->insert_node(isset($_POST['parent-task']) ? $_POST['parent-task'] : null, $type);

			$workers = explode(',', $_POST['task']['Workers']);

			foreach($workers as $w){
				$projectUsers = new Tasks_To_Users_Class();
				$projectUsers->setTaskID($nested_task);
				$projectUsers->setUserID($w);
				$projectUsers->save();
			}
			return true;
		}

		public function update_task($id) {
			$task = new Tasks_Class($id);
			$task->setName($_POST['task']['Name']);
			$task->setBusinessID($_POST['task']['Business']);
			$task->setStartDate(date('Y-m-d', strtotime($_POST['task']['Startdate'])));
			$task->setInternalDeadline(date('Y-m-d', strtotime($_POST['task']['internal-end-date'])));
			$task->setClientDeadline(date('Y-m-d', strtotime($_POST['task']['external-end-date'])));
			$task->setNotes($_POST['task']['Notes']);
			$task->setTaskTypeID($type = $_POST['task']['Type']);
			if(isset($_POST['task']['Project'])){
				$task->setProjectID($_POST['task']['Project']);
			}
			$task->setStatusID($_POST['task']['Status']);
			$task->setLastUpDated(date('Y-m-d', strtotime('today')));
			$task->setUpdatedBy($this->session->userdata('user_id'));
			$task->save();

			$workers = explode(',', $_POST['task']['Workers']);

			foreach($workers as $key => $w){
				$this->db->select('sort');
				$this->db->from('tasks_to_users');
				$this->db->where('task_id', $task->getID());
				$this->db->where('user_id', $w);
				$query = $this->db->get();
				$query = $query->row_array();

				$arr[] = array('userID' => $w, 'sortID' => $query['sort']);
				
			}

			$this->db->delete('tasks_to_users', array('task_id' => $task->getID())); 

			foreach($arr as $w){
				$projectUsers = new Tasks_To_Users_Class();
				$projectUsers->setTaskID($task->getID());
				$projectUsers->setUserID($w['userID']);
				$projectUsers->setSort($w['sortID']);
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
			$data = array('complete' => 'Y', 'actual_completion_date' => date('Y-m-d', strtotime('today')));
			$this->db->where('task_id', $id);
			$this->db->update('tasks', $data);
			return true;
		}

		public function uncomplete_task($id){
			$data = array('complete' => 'N', 'actual_completion_date' => null);
			$this->db->where('task_id', $id);
			$this->db->update('tasks', $data);
			return true;
		}

		public function update_users_task_order(){
			foreach($_POST['item'] as $key => $value){
				$sql = "UPDATE tasks_to_users set sort = ? where task_id = ? and user_id = ?";
				$this->db->query($sql, array($key, $value, $this->session->userdata('user_id')));
			}	
		}

		public function task_sort_order(){
			foreach($_POST['item'] as $key => $value){
				$sql = "UPDATE tasks set sort = ? where task_id = ?";
				$this->db->query($sql, array($key, $value));
			}	
		}

		public function get_business(){
			$this->db->select('*');
			$this->db->from('businesses');
			$query = $this->db->get();
			$query = $query->result_array();

			return $query;
		}

		public function get_typeoptions(){
			$this->db->select('*');
			$this->db->from('task_type');
			$query = $this->db->get();
			$query = $query->result_array();

			return $query;
		}

		public function get_all_status(){
			$this->db->select('*');
			$this->db->from('status_table');
			$query = $this->db->get();
			$query = $query->result_array();
			return $query;
		}

		public function json_project_user($id){
			$sql ="SELECT u.user_id as id, name
			from users as u
			inner join tasks_to_users as ttu on ttu.user_id = u.user_id
			where ttu.task_id = ?";
			$query = $this->db->query($sql, array($id));
			return json_encode($query->result_array());
		}

		public function get_task_comments($id){
			$this->db->select('*');
			$this->db->from('task_comments');
			$this->db->where('task_id', $id);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function add_task_comment($id){
			$data = array(
			   'task_id' => $id,
			   'comment' => $_POST['data'],
			   'user_id' => $this->session->userdata('user_id')
			);

			$this->db->insert('task_comments', $data); 
		}

		public function remove_task_comment($id){
			$this->db->delete('task_comments', array('task_comment_id' => $id));
			return;		
		}

		public function get_task_of_comment($id){
			$this->db->select('task_id');
			$this->db->from('task_comments');
			$this->db->where('task_comment_id', $id);
			$query = $this->db->get();
			return $query->row();
		}

	}
?>