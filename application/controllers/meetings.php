<?php 
	

	class Meetings extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isAuthorised();
			$this->load->model('login_model');
			$this->load->library('encrypt');
			$this->load->model('meeting_model');
			$this->load->model('contact_model');
			$this->load->model('user_model');
			$this->load->model('email');
		}

		public function index(){
			$data['title'] = 'Meetings';
			$this->render_view('meetings/index', $data);

		}

		public function add_meeting(){
			$this->meeting_model->add_meeting();
			
			if(isset($_POST['email']) && $_POST['email'] == 'checked'){
				// send emails out in here
				$employees = explode(',', $_POST['employees']);
				foreach($employees as $employee){
					$p = $this->user_model->get($employee);
					$message = 'Hello, We have set up and email for you...'; //
					$this->email->do_email($p['simon@logicdesign.co.uk'], 'hello@logicdesign.co.uk', 'Logic Design', 'Meeting | Logic Design', $message);
				}

				$people = explode(',', $_POST['people']);
				foreach($people as $peeps){
					$p = $this->contact_model->get($peeps);
					$message = 'Hello, We have set up and email for you...'; //
					$this->email->do_email($p['email'], 'hello@logicdesign.co.uk', 'Logic Design', 'Meeting | Logic Design', $message);
				}
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

		public function get($id){
			$data['meeting_info'] = $this->meeting_model->get($id);
			$this->load->partial('partials/meeting_partial', $data);
		}

		public function delete($id){
			$this->meeting_model->delete($id);
			return true;
		}

	}	