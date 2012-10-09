<?php 

	require_once('application/libraries/classes/Tasks.php');

	class Tasks extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('task_model');
		}

		public function index(){
			$data['title'] = 'Tasks Page';
			$data['task_list'] = $this->task_model->get();
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

		public function search() {
			$d = $_POST['data'];
			if($this->request->isPost()){
				$data['task_list'] = $this->task_model->search_tasks($d);
				if(!empty($data['task_list'])){
					$this->load->partial('tasks/partials/table_partial', $data);
				} else {
					return false;
				}
			} else {
				return false;
			}
		}

		public function user_tasks($id){
			$data['title'] = 'Tasks Page';
			$data['task_list'] = $this->task_model->get_users_tasks($id);
			$this->render_view('tasks/users_view', $data);
		}

		public function details($taskid){
			$data['task_details'] = $this->task_model->get($taskid);
			$data['worker_details'] = $this->task_model->worker_details($taskid);
			$data['sub_tasks'] = $this->task_model->get_subtasks($taskid);
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
	}
?>