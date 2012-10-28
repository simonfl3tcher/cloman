<?php 
	
	class Dashboard extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isClientAuthorised();
		}

		public function index(){
			var_dump('dgfddf');
			exit;
		}
	}
?>