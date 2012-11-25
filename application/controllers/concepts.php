<?php 
	

	class Concepts extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('projects_model');
			$this->load->helper('date');
		}

		public function add_comment(){
			$this->projects_model->add_comment_to_concept();
			$data['comms'] = $this->projects_model->get_comments($_POST['concept']);
			echo $this->load->partial('partials/client_comments_partial.php', $data);
		}

		public function client_seen($id){
			$this->projects_model->client_seen($id);
			return true;
		}
	}