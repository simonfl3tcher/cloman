<?php 
	
	class Projects extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('projects_model');
		}

		public function index($id){
			$data['title'] = 'Project Overview | Logic Client';
			$data['project_details'] = $this->projects_model->project_details($id);
			$this->render_client_view('project/overview', $data);
		}

		public function view($id){
			$data['title'] = 'Project Overview | Logic Client';
			$data['project_details'] = $this->projects_model->project_details($id);
			$this->render_client_view('project/overview', $data);
		}
	}