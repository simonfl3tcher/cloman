<?php 

	require_once('application/libraries/classes/Projects.php');
	require_once('application/libraries/classes/Project_To_Users.php');
	

	class Projects_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function insert_project(){
			$project = new Project_Class();
			$project->setBusinessID($_POST['project']['Business']);
			$project->setSalesID($_POST['project']['Salesman']);
			$project->setProjectName($_POST['project']['Name']);
			$project->setManagerID($_POST['project']['Manager']);
			$project->setProjectTypeID($_POST['project']['Type']);
			$project->setStatusID($_POST['project']['Status']);
			$project->setStartDate(date('Y-m-d', strtotime($_POST['project']['Startdate'])));
			$project->setInternalDeadline(date('Y-m-d', strtotime($_POST['project']['internal-end-date'])));
			$project->setClientDeadline(date('Y-m-d', strtotime($_POST['project']['external-end-date'])));
			$project->setNotes($_POST['project']['Notes']);
			$project->setBudget($_POST['project']['Cost']);
			$project->save();

			$workers = explode(',', $_POST['project']['Workers']);

			foreach($workers as $w){
				$projectUsers = new Project_To_Users_Class();
				$projectUsers->setProjectID($project->getID());
				$projectUsers->setUserID($w);
				$projectUsers->save();
			}
		}

		public function search_managers_token($data){
			$sql = "SELECT u.user_id as id, name from users as u
			inner join users_to_group as ug on ug.user_id = u.user_id
			where name like '%{$data}%' and ug.group_id = 1";
			$query = $this->db->query($sql);
			return json_encode($query->result_array());
		}

		public function search_salesman_token($data){
			$sql = "SELECT u.user_id as id, name from users as u
			inner join users_to_group as ug on ug.user_id = u.user_id
			where name like '%{$data}%' and ug.group_id = 2";
			$query = $this->db->query($sql);
			return json_encode($query->result_array());
		}

		public function search_workers_token($data){
			$sql = "SELECT u.user_id as id, name from users as u
			inner join users_to_group as ug on ug.user_id = u.user_id
			where name like '%{$data}%' and (ug.group_id = 3 or ug.group_id = 4)";
			$query = $this->db->query($sql);
			return json_encode($query->result_array());
		}

		public function get_project_types(){
			$this->db->select('*');
			$this->db->from('project_type');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_project_status(){
			$this->db->select('*');
			$this->db->from('status_table');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_project_list(){
			$this->db->select('*');
			$this->db->from('projects');
			$this->db->join('users', 'projects.manager_id = users.user_id');
			$this->db->join('businesses', 'businesses.business_id = projects.business_id');
			$this->db->where('complete', 'N');
			$this->db->order_by('status_id desc, internal_deadline desc'); 
			$query = $this->db->get();
			return $query->result_array();
		}

		public function project_deatils($id){
			$sql = "SELECT p.*, pt.name as project_type, st.name as status_name, u.*, uu.name as sales_name, uu.display_name as sales_display_name, b.name as business_name from projects as p
				inner join users as u on u.user_id = p.manager_id
				inner join users as uu on uu.user_id = p.sales_id
				inner join businesses as b on b.business_id = p.business_id
				inner join project_type as pt on pt.project_type_id = p.project_type_id
				inner join status_table as st on st.status_id = p.status_id
				where p.project_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row();
		}

		public function project_workers($id){
			$sql = "SELECT u.* from projects as p
			inner join project_to_users as ptu on ptu.project_id = p.project_id
			inner join users as u on u.user_id = ptu.user_id
			where p.project_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}
	}