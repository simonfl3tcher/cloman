<?php 
	
	class Support_Packs extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('support_pack_model');
		}

		public function index(){
			$data['title'] = ucfirst('Project Management');
			$data['list_of_support_packs'] = $this->support_pack_model->get_avalible_support_packs();
			$this->render_view('support_packs/index', $data);
		}

		public function add(){
			var_dump('You are adding a support pack here');
			exit;
		}
	}

?>