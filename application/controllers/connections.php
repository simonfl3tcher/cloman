<?php 

	class Connections extends CI_Controller {

		public function __constructor(){
			parent::__constructor();
		}

		public function index(){
			$data['title'] = 'Connections Page';
			$this->load->view('templates/header', $data);
			$this->load->view('connections/index', $data);
			$this->load->view('templates/footer');
		}

		public function add(){
			// add the connections in this page.
			$data['title'] = 'Add a connection';
			$this->load->view('templates/header', $data);
			$this->load->view('connections/add', $data);
			$this->load->view('templates/footer');
		}

		public function delete(){

		}
	}
?>