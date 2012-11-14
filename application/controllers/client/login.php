<?php 
	
	class Login extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('login_model');
			$this->load->library('encrypt');
		}

		public function index(){
			if($this->request->isPost()){
				$results = $this->login_model->client_login();
				if(!empty($results)){
					$this->login_model->set_client_login($results->people_id);
					$this->session->set_userdata('Client_Logged_In', true);
					$this->session->set_userdata('people_id', $results->people_id);
					redirect('/client', 'refresh');
				} else {
					$data['error'] = 'Your username / password do not match. please try again';
				}
			} 
			if(!$this->session->userdata('Client_Logged_In')){
				$data['title'] = 'Login Page';
				$this->render_client_view('login/index', $data);
			} else {
				redirect('/client', 'refresh');
			}
		}
	}
?>