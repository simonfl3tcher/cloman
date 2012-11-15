<?php 
	

	class Meetings extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isAuthorised();
			$this->load->model('login_model');
			$this->load->library('encrypt');
			$this->load->model('meeting_model');
		}

		public function index(){
			$data['title'] = 'Meetings';
			$this->render_view('meetings/index', $data);

		}

		public function add_meeting(){
			$this->meeting_model->add_meeting();
			if($_POST['email'] == 'Y'){
				// send emails out in here
			}
			return true;
		}

		public function update_meeting(){
			$this->meeting_model->update_meeting();
			return true;
		}

		public function get_meetings(){
			echo $this->meeting_model->get_json_meetings();
			exit;
		}

	}	