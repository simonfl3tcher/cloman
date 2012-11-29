<?php 
	

	class Support extends CI_Controller {


		public function __construct(){
			parent::__construct();
			$this->isClientAuthorised();
			$this->load->model('projects_model');
			$this->load->model('people_model');
			$this->load->model('support_pack_model');
			$this->load->model('email');
		}

		public function index() {
			$data['title'] = 'Client Dashboard';
			$data['projects'] = $this->projects_model->get_projects_to_person($this->session->userdata('people_id'));
			$count = 0;
			foreach($data['projects'] as $proj){
				$c = $this->projects_model->get_comment_count($proj['project_id']);
				$data['projects'][$count]['comment_count'] = $c['count'];
				$count++;
			}

			$data['user_data'] = $this->people_model->get($this->session->userdata('people_id'));
			$data['comment_full_count'] = $this->projects_model->customer_full_count();
			$data['support_packs'] = $this->support_pack_model->get_client_support_packs();
			$this->render_client_view('support_packs', $data);
		}

		public function callback_email($id = null){
			$user = $this->people_model->get($this->session->userdata('people_id'));
			$message = 'Hello, You have got a callback request for support pack:- ' . $id . ' Email address: - ' . $user['email']; //
			$this->email->do_email($user['email'], 'hello@logicdesign.co.uk', 'Logic Design', 'Callback Request | Logic Design', $message);
			var_dump($user['email']);
			exit;
		}
	}

?>