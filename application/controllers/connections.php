<?php 

	class Connections extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('connections_model');
		}

		public function index(){
			$data['title'] = 'Connections Page';
			$data['connection_list'] = $this->connections_model->get();
			$data['connection_types'] = $this->connections_model->get_connection_types();
			$data['type_options'] = array();
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
			$d = $_POST['data'];
			if($this->request->isPost()){
				$data['connection_list'] = $this->connections_model->search_connections($d);
				if(!empty($data['connection_list'])){
					$this->load->partial('connections/partials/table_partial', $data);
				} else {
					return false;
				}
			} else {
				return false;
			}
		}

		public function advanced_search(){
			if($this->request->isAjax()){
				$data['connection_list'] = $this->connections_model->advanced_search();
				if(!empty($data['connection_list'])){
					$this->load->partial('connections/partials/table_partial', $data);
				} else {
					return false;
				}
			} else {
				redirect('/connections', 'refresh');
			}
		}

		public function disable($id){
			$this->connections_model->disable_connection($id);
			// redirect('/businesses', 'refresh');
		}
	}
?>