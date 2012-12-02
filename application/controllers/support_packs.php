<?php 
	
	class Support_Packs extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isAuthorised();
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
			$d = $_POST['data'];
			if($this->request->isPost()){
				$data['list_of_businesses'] = $this->support_pack_model->search_support_packs($d);
				if(!empty($data['list_of_businesses'])){
					$this->load->partial('support_packs/partials/table_partial.php', $data);
				} else {
					return false;
				}
			} else {
				return false;
			}
		}

		public function details($id){
			$data['support_details'] = $this->support_pack_model->support_details($id);
			$data['support_businesses'] = $this->support_pack_model->support_businesses($id);
			$data['icon'] = 'projectIcon';
			$data['bannerTitle'] = $data['support_details']->name;
			$data['sidebarUrl'] = 'sidebar-views/support_packs_view';
			$data['editLink'] = '/support_packs/view/' .  $data['support_details']->support_packs_id;
			$this->load->partial('sidebar-views/details_partial', $data);
		}

		public function view($id = null){
			
			if($this->request->isPost()){
				if($this->support_pack_model->update_support_pack($id)){
					redirect('/support_packs', 'refresh');
				}
			}

			$data['title'] = 'Edit Support Pack';
			$data['support_pack'] = $this->support_pack_model->get_avalible_support_packs($id);

			$this->render_view('support_packs/view', $data);
		}

		public function add_to_business($id){
			$q = $this->support_pack_model->add_support_pack_to_business($id, $_POST['data']);
			$data['current_support_packs'] = $this->support_pack_model->get_support_packs_for_business($id);
			$this->load->partial('partials/support_pack_partial.php', $data);
		}

		public function all(){
			$data['title'] = ucfirst('Support Packs');
			$data['list_of_businesses'] = $this->support_pack_model->get_list_of_businesses();
			$this->render_view('support_packs/view_all', $data);
		}

		public function disable($id){
			return $this->support_pack_model->disable($id);
		}

		public function renew($id){
			return $this->support_pack_model->renew($id);
		}
	}

?>