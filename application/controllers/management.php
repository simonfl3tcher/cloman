<?php 
	
	class Management extends CI_Controller {

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$data['title'] = ucfirst('Project Management');
			$this->render_view('pages/management', $data);
		}
	}

?>