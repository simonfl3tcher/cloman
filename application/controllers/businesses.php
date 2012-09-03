<?php 
	
	class Businesses extends CI_Controller {

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$data['title'] = 'Businesses Page';
			$this->load->view('templates/header', $data);
			$this->load->view('businesses/index', $data);
			$this->load->view('templates/footer');
		}

		public function add(){
			$data['title'] = 'Add a business';
			$this->load->view('templates/header', $data);
			$this->load->view('businesses/add', $data);
			$this->load->view('templates/footer');
		}
	}
?>