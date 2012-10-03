<?php 	


	class Tasks extends CI_Controller {

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			var_dump('You are getting in here');
			exit;
		}

		public function add($project_id = null){
			var_dump('This needs to be added in properly');
			exit;
		}
	}
?>