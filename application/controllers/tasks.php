<?php 	


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
	}
?>