<?php 	

	class Projects extends CI_Controller {

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$data['title'] = 'Projects Page';
			$this->render_view('projects/index', $data);
		}

		public function add(){
			$data['title'] = 'Add a project';
			$this->render_view('projects/add', $data);
		}

	}
?>