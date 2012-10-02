<?php 

	class Logout extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('login_model');
		}


		public function index(){
			// You need to update the user to logged out at this point as well.
			$this->login_model->set_logout($this->session->userdata('user_id'));
			$this->session->unset_userdata('Logged_In');
			redirect('/', 'refresh');
		}
	}
?>