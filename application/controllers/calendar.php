<?php 
	
	class Calendar extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isAuthorised();
			$this->load->model('login_model');
			$this->load->library('encrypt');
		}

		public function index(){
			$data['title'] = 'Planners';
			$this->render_view('planners/projects', $data);
		}

		public function projects(){
			$data['title'] = 'Project Calendar';
			$this->render_view('planners/projects', $data);
		}

		public function tasks(){
			$data['title'] = 'Task Calendar';
			$this->render_view('planners/tasks', $data);
		}

		public function employees(){
			$data['title'] = 'Task Calendar';
			$this->render_view('planners/employees', $data);
		}
	}
?>