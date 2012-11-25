<?php 
	
	class Dashboard extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isClientAuthorised();
			$this->load->model('projects_model');
			$this->load->model('people_model');
		}

		public function index(){
			$data['title'] = 'Client Dashboard';
			$data['projects'] = $this->projects_model->get_projects_to_person($this->session->userdata('people_id'));
			$data['comment_count'] = $this->projects_model->customer_comment_count($this->session->userdata('people_id'));
			$data['user_data'] = $this->people_model->get($this->session->userdata('people_id'));
			$this->render_client_view('dashboard', $data);
		}
	}
?>