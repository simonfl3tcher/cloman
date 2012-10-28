<?php 
	
	class Calendar extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isAuthorised();
			$this->load->model('login_model');
			$this->load->library('encrypt');
		}

		public function index(){
			$data['title'] = 'Calendar Page';
			$this->render_view('calendar/index', $data);
		}
	}
?>