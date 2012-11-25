<?php 
	
	class Project extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isClientAuthorised();
			$this->load->model('projects_model');
			$this->load->model('people_model');
			$this->load->helper('date');
		}

		public function index($id){
			$data['title'] = 'Project Overview | Logic Client';
			$data['project_details'] = $this->projects_model->project_details($id);
			$data['comment_count'] = $this->projects_model->customer_comment_count();
			$this->render_client_view('project/overview', $data);
		}

		public function view($id){
			$data['title'] = 'Project Overview | Logic Client';
			$data['project_details'] = $this->projects_model->project_details($id);
			$data['projects'] = $this->projects_model->get_projects_to_person($this->session->userdata('people_id'));
			$data['concepts'] = $this->projects_model->get_concept_data($id);
			$count = 0;
			foreach($data['concepts'] as $con){
				$data['concepts'][$count]['comms'] = $this->projects_model->get_comments($con['concept_id']);
				$count++;
			}
			$data['user_data'] = $this->people_model->get($this->session->userdata('people_id'));
			$this->render_client_view('project', $data);
		}
	}

?>