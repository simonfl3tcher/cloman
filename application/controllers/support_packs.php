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
			$this->support_pack_model->add_support_pack();
			var_dump('You are adding a support pack here');
			exit;
		}

		public function search(){
			var_dump('you are searching');
			exit;
		}

		public function details($id){
			$data['support_details'] = $this->support_pack_model->support_details($id);
			$data['icon'] = 'projectIcon';
			$data['bannerTitle'] = $data['support_details']->name;
			$data['sidebarUrl'] = 'sidebar-views/support_packs_view';
			$data['editLink'] = '/support_packs/view/' .  $data['support_details']->support_packs_id;
			$this->load->partial('sidebar-views/details_partial', $data);
		}
	}

?>