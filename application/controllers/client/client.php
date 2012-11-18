<?php 
	
	class Client extends CI_Controller {


		public function __construct(){
			parent::__construct();
			$this->isClientAuthorised();
			$this->load->model('projects_model');
		}


		public function index(){
			$data['title'] = 'Client Dashboard';
			$data['projects'] = $this->projects_model->get_projects_to_person($this->session->userdata('people_id'));
			$this->render_client_view('dashboard', $data);
		}

	}
?>