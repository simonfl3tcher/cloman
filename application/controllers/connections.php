<?php 

	class Connections extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('business_model');
			$this->load->model('connections_model');
		}

		public function index(){
			$data['title'] = 'Connections Page';
			$data['business_list'] = $this->business_model->get();
			$data['connection_types'] = $this->connections_model->get_connection_types();
			$data['type_options'] = array();
			foreach($data['connection_types'] as $con){
				$data['type_options'][$con['connection_options_id']] = $con['name'];
			}
			$this->render_view('connections/index', $data);
		}

		public function add(){
			// add the connections in this page.
			var_dump('You are in the add connection here');
			exit;
			$data['title'] = 'Add a connection';
			$this->load->view('templates/header', $data);
			$this->load->view('connections/add', $data);
			$this->load->view('templates/footer');
		}

		public function delete(){

		}

		public function search(){
			echo 'The search results...';
			exit;
		}
	}
?>