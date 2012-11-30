<?php 	

	
	class Faq extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isClientAuthorised();
			$this->load->model('projects_model');
			$this->load->model('people_model');
		}

		public function index(){
			if($this->request->isPost()){
				if($this->projects_model->ask_question()){
					$data['success'] = 'Your question has been sent to Logic Design to be answered';
				} else {
					$data['error'] = 'This question has already been asked';
				}
			}

			$data['title'] = 'Project Overview | Logic Client';
			$data['projects'] = $this->projects_model->get_projects_to_person($this->session->userdata('people_id'));
			$count = 0;
			foreach($data['projects'] as $proj){
				$c = $this->projects_model->get_comment_count($proj['project_id']);
				$data['projects'][$count]['comment_count'] = $c['count'];
				$count++;
			}
			$data['user_data'] = $this->people_model->get($this->session->userdata('people_id'));
			$data['comment_full_count'] = $this->projects_model->customer_full_count();
			$data['faqs'] = $this->people_model->get_faqs();
			$this->render_client_view('faq', $data);
		}

	}