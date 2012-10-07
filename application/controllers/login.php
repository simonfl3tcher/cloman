<?php 
	
	class Login extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('login_model');
			$this->load->library('encrypt');
		}

		public function index(){
			if($this->request->isPost()){
				$results = $this->login_model->login();
				if(!empty($results)){
					$this->login_model->set_login($results->user_id);
					$this->session->set_userdata('Logged_In', true);
					$this->session->set_userdata('user_id', $results->user_id);
					$_SESSION['username'] = $results->display_name;
					redirect('/', 'refresh');
				} else {
					$data['error'] = 'Your username / password do not match. please try again';
				}
			} 
			if(!$this->session->userdata('Logged_In')){
				$data['title'] = 'Login Page';
				$this->load->view('templates/header', $data);
				$this->load->view('login/index', $data);
				$this->load->view('templates/footer', $data);
			} else {
				redirect('/', 'refresh');
			}
		}
	}
?>