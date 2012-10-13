<?php 

	class Reminder extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('reminder_model');
		}

		public function add(){
			$this->reminder_model->add_reminder();
			var_dump('adding a reminder here');
		}
	}
?>