<?php 	

	require_once('application/libraries/classes/Projects.php');
	require_once('application/libraries/classes/Project_To_Users.php');

	class Projects extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isAuthorised();
			$this->load->model('projects_model');
			$this->load->model('Nested_Sets_Model');
		}

		public function index(){
			$data['title'] = 'Projects Page';


			$data['project_types'] = $this->projects_model->get_project_types();
			$data['type_options'] = array();
			foreach($data['project_types'] as $con){
				$data['type_options'][$con['project_type_id']] = $con['name'];
			}


			$data['project_status'] = $this->projects_model->get_project_status();
			$data['status_options'] = array();
			foreach($data['project_status'] as $stat_opts){
				$data['status_options'][$stat_opts['status_id']] = $stat_opts['name'];
			}


			$data['list_of_projects'] = $this->projects_model->get_project_list();
			$this->render_view('projects/index', $data);
		}

		public function add(){
			if(!$this->request->isAjax()){
				$data['title'] = 'Add a project';
				$this->render_view('projects/add', $data);
			} else {
				$this->projects_model->insert_project();
			}
		}

		public function search(){
			$d = $_POST['data'];
			if($this->request->isPost()){
				$data['list_of_projects'] = $this->projects_model->search_projects($d);
				if(!empty($data['list_of_projects'])){
					$this->load->partial('projects/partials/grid_partial.php', $data);
				} else {
					return false;
				}
			} else {
				return false;
			}
		}

		public function token_managers(){
			$q = $this->projects_model->search_managers_token($_GET['q']);
			echo $q;
		}

		public function token_salesman(){
			$q = $this->projects_model->search_salesman_token($_GET['q']);
			echo $q;
		}

		public function token_workers(){
			$q = $this->projects_model->search_workers_token($_GET['q']);
			echo $q;
		}

		public function token_all_workers(){
			$q = $this->projects_model->search_all_workers_token($_GET['q']);
			echo $q;
		}

		public function details($projectId){
			$data['project_details'] = $this->projects_model->project_deatils($projectId);
			$data['project_workers'] = $this->projects_model->project_workers($projectId);
			$data['project_tasks'] = $this->Nested_Sets_Model->get_tasks_for_projects($projectId);
			$data['comments'] = $this->projects_model->get_project_comments($projectId);
			$data['hold_time'] = $this->projects_model->get_hold_time($projectId);
			$data['project_time'] = $this->projects_model->get_full_project_time($projectId);
			$data['title'] = 'Project Details';

			// Bellow is needed for the side bar partial to work.
			$data['icon'] = 'projectIcon';
			$data['bannerTitle'] = $data['project_details']->project_name;
			$data['sidebarUrl'] = 'sidebar-views/projects_view';
			$data['editLink'] = '/projects/view/' .  $data['project_details']->project_id;
			$this->load->partial('sidebar-views/details_partial', $data);
		}

		public function view($id = null){
			$project = new Project_Class($id);
			
			if($this->request->isPost()){
				if($this->projects_model->update_project($project->getID())){
					redirect('/projects', 'refresh');
				}
			}

			$data['project_types'] = $this->projects_model->get_project_types();
			$data['type_options'] = array();
			foreach($data['project_types'] as $con){
				$data['type_options'][$con['project_type_id']] = $con['name'];
			}

			$data['project_status'] = $this->projects_model->get_project_status();
			$data['status_options'] = array();
			foreach($data['project_status'] as $stat_opts){
				$data['status_options'][$stat_opts['status_id']] = $stat_opts['name'];
			}

			$data['title'] = 'Edit the project';
			$data['project'] = $project;

			$this->render_view('projects/view', $data);
		}

		public function get_business($id){
			$q = $this->projects_model->project_business($id, true);
			echo $q;
		}

		public function get_manager($id){
			$q = $this->projects_model->project_manager($id, true);
			echo $q;
		}

		public function get_salesman($id){
			$q = $this->projects_model->project_salesman($id, true);
			echo $q;
		}

		public function get_workers($id){
			$q = $this->projects_model->json_project_user($id, true);
			echo $q;
		}

		public function add_comment($id){
			$this->projects_model->add_project_comment($id);
			$data['comments'] = $this->projects_model->get_project_comments($id);
			echo $this->load->partial('partials/projects_comments_partial.php', $data);
		}

		public function remove_comment($commentId) {
			$projectNumber = $this->projects_model->get_project_of_comment($commentId);
			$this->projects_model->remove_project_comment($commentId);
			$data['comments'] = $this->projects_model->get_project_comments($projectNumber->project_id);
			echo $this->load->partial('partials/projects_comments_partial.php', $data);
		}

		public function hold($id){
			// This function is used to put projects on hold. 
			$this->projects_model->put_project_on_hold($id);
			return true;
		}

		public function unhold($id){
			$this->projects_model->unhold_project($id);
			return true;
		}

		public function complete($id){
			$this->projects_model->complete($id);
			return true;
		}

		public function get_tasks_against_project($projectId){
			// This function is used for the timesheets functionality
			echo $this->Nested_Sets_Model->get_tasks_for_projects($projectId, true);
		}

		public function get_project_against_business($businessId){
			echo $this->projects_model->get_project_against_business($businessId);
		}

	}
?>