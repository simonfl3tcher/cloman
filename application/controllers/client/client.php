<?php 
	
	class Client extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isClientAuthorised();
			$this->load->model('projects_model');
			$this->load->model('support_pack_model');
			$this->load->model('people_model');
		}

		public function index(){
			$data['title'] = 'Client Dashboard';
			$data['projects'] = $this->projects_model->get_projects_to_person($this->session->userdata('people_id'));
			$data['user_data'] = $this->people_model->get($this->session->userdata('people_id'));
			$this->render_client_view('dashboard', $data);
		}

		public function support() {
			$data['title'] = 'Client Dashboard';
			$data['support_packs'] = $this->support_pack_model->get_avalible_support_packs();
			$this->render_client_view('support_packs', $data);
		}

	}
?>