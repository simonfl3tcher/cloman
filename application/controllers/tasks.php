<?php 

	require_once('application/libraries/classes/Tasks.php');

	class Tasks extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('task_model');
			$this->load->model('Nested_Sets_Model');
		}

		public function index(){
			$data['title'] = 'Tasks Page';
			$data['task_list'] = $this->task_model->get();
			$this->render_view('tasks/index', $data);
		}

		public function archived_tasks(){
			$data['title'] = 'Tasks Page';
			$data['task_list'] = $this->task_model->get_archived_tasks();
			$data['archive'] = true;
			$this->render_view('tasks/index', $data);
		}

		public function view($id = null){
			$task = new Tasks_Class($id);
			if($this->request->isPost()){
				if($this->task_model->update_task($task->getID())){
					redirect('/tasks', 'refresh');
				}
			}

			$query = $this->task_model->get_business();
			$data['businesses'] = array();
			$data['businesses'][0] = '';
			foreach($query as $con){
				$data['businesses'][$con['business_id']] = $con['name'];
			}

			$query = $this->task_model->get_all_status();
			$data['type_status'] = array();
			$data['type_status'][0] = '';
			foreach($query as $con){
				$data['type_status'][$con['status_id']] = $con['name'];
			}

			$query = $this->task_model->get_typeoptions();
			$data['type_options'] = array();
			$data['type_options'][0] = '';
			foreach($query as $con){
				$data['type_options'][$con['task_type_id']] = $con['name'];
			}

			$data['title'] = 'Edit the task';
			$data['task'] = $task;

			$this->render_view('tasks/view', $data);

		}

		public function add($project_id = null){
			if(!$this->request->isAjax()){
				$this->redirect('/', 'refresh');
			} else {
				$this->task_model->insert_task();
			}
		}

		public function get_projects_for_busines($id = null){
			echo $this->task_model->get_project_for_business($id); 
		}

		public function search($archive=null) {
			if($archive != null){
				$data['archive'] = true;
			}
			$d = $_POST['data'];
			if($this->request->isPost()){
				$data['task_list'] = $this->task_model->search_tasks($d, $archive);
				if(!empty($data['task_list'])){
						$this->load->partial('tasks/partials/table_partial', $data);
				} else {
					return false;
				}
			} else {
				return false;
			}
		}


		public function user_tasks(){
			$data['title'] = 'Tasks Page';
			$data['task_list'] = $this->task_model->get_users_tasks($this->session->userdata('user_id'));
			$this->render_view('tasks/users_view', $data);
		}

		public function user_archived_tasks(){
			$data['title'] = 'Title My archived tasks';
			$data['task_list'] = $this->task_model->get_users_archived_tasks($this->session->userdata('user_id'));
			$data['archive'] = true;
			$this->render_view('tasks/index', $data);
		}

		public function details($taskid){
			$data['task_details'] = $this->task_model->get($taskid);
			$data['worker_details'] = $this->task_model->worker_details($taskid);
			$data['sub_tasks'] = $this->Nested_Sets_Model->get_nested_set($taskid);
			$data['comments'] = $this->task_model->get_task_comments($taskid);
			$data['total_task_time'] = $this->task_model->get_task_time($taskid);
			$data['user_task_time'] = $this->task_model->get_task_time($taskid, $this->session->userdata('user_id'));
			$data['title'] = 'Task Details';
			// Bellow is needed for the side bar partial to work.
			$data['icon'] = 'businessIcon';
			$data['bannerTitle'] = $data['task_details']->name;
			$data['sidebarUrl'] = 'sidebar-views/tasks_view';
			$data['editLink'] = '/tasks/view/' .  $data['task_details']->task_id;
			$this->load->partial('sidebar-views/details_partial', $data);
		}

		public function complete($id){
			$this->task_model->complete_task($id);
			return true;
		}

		public function uncomplete($id){
			$this->task_model->uncomplete_task($id);
			return true;
		}

		public function users_task_sort(){
			$this->task_model->update_users_task_order();
			return true;
		}

		public function get_workers($id){
			$q = $this->task_model->json_project_user($id, true);
			echo $q;
		}

		public function task_sort(){
			$this->task_model->task_sort_order();
			return true;
		}

		public function add_comment($id){
			$this->task_model->add_task_comment($id);
			$data['comments'] = $this->task_model->get_task_comments($id);
			echo $this->load->partial('partials/tasks_comments_partial.php', $data);
		}

		public function remove_comment($commentId) {
			$taskNum = $this->task_model->get_task_of_comment($commentId);
			$this->task_model->remove_task_comment($commentId);
			$data['comments'] = $this->task_model->get_task_comments($taskNum->task_id);
			echo $this->load->partial('partials/tasks_comments_partial.php', $data);
		}


		/* Bellow is all the functions to allow you to add time against a task */

		// I need to call the timer on hold function if you go off the tasks page!! 

		public function start_timer($task_id){
			// put the timer in the database
			return $this->task_model->start_timer($task_id);
		}

		public function pause_timer($task_id){
			// pause the timer here
			return $this->task_model->pause_timer($task_id);
		}

		public function complete_timer($task_id){
			// Complete the timer task
			$this->task_model->complete_timer($task_id);
		}

		public function add_standard_task_time($task_id){
			// Adding task time manually
			$this->task_model->add_standard_task_time($task_id);
			exit;
		}

	}
?>