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
			$data['type_options'][0] = '';
			foreach($data['connection_types'] as $con){
				$data['type_options'][$con['connection_options_id']] = $con['name'];
			}
			$this->render_view('connections/index', $data);
		}

		public function add(){
			if(!$this->request->isAjax()){
				$data['title'] = 'Add a business';
				$this->render_view('connections/add', $data);
			} else {
				$this->connections_model->insert_connection();
			}
		}

		public function delete(){

		}

		public function search(){
			echo 'The search results...';
			exit;
		}
	}
?>