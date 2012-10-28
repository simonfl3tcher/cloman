<?php 
	
	class Tasks extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isClientAuthorised();
		}

		public function index($direct = null){
			var_dump($direct);
			var_dump('you are in here');
			exit;
		}
	}
?>