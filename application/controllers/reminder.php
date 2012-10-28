<?php 

	class Reminder extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isAuthorised();
			$this->load->model('reminder_model');
		}

		public function add(){
			$this->reminder_model->add_reminder();
		}
	}
?>