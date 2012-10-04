<?php 	


	class Tasks extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('task_model');
		}

		public function index(){
			var_dump('You are getting in here');
			exit;
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
	}
?>