<?php 
	
	class Businesses extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('business_model');
			$this->load->model('contact_model');
		}

		public function index(){
			$data['title'] = 'Businesses Page';
			$data['business_list'] = $this->business_model->get();
			$data['contacts'] = $this->contact_model->get();
			$this->load->view('templates/header', $data);
			$this->load->view('businesses/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($id){
			var_dump('You are here to view the business with the id of : ' . $id);
			exit;
		}

		public function add(){
			if(!$this->request->isAjax()){
				$data['title'] = 'Add a business';
				$this->load->view('templates/header', $data);
				$this->load->view('businesses/add', $data);
				$this->load->view('templates/footer');
			} else {
				$this->business_model->insert_business();
			}
		}

		public function search() {
			$d = $_POST['data'];
			if($this->request->isPost()){
				$data['business_list'] = $this->business_model->search_business($d);
				if(!empty($data['business_list'])){
					$this->load->partial('businesses/partials/table_partial', $data);
				} else {
					return false;
				}
			} else {
				return false;
			}
		}

		public function token(){
			// this is used for the search on people add. do not remove or change
			$q = $this->business_model->search_business_token($_GET['q']);
			echo $q;
		}

		public function disable($id){
			$member = $this->business_model->disable_business($id);
			redirect('/businesses', 'refresh');
		}

		public function details($businessId){
			$data['business_details'] = $this->business_model->business_details($businessId);
			$data['contact_details'] = $this->business_model->contact_details($businessId);
			$data['title'] = 'Contact Details';
			// Bellow is needed for the side bar partial to work.
			$data['icon'] = 'businessIcon';
			$data['bannerTitle'] = $data['business_details']->name;
			$data['sidebarUrl'] = 'sidebar-views/business_view';
			$data['editLink'] = '/businesses/view/' .  $data['business_details']->business_id;
			$this->load->partial('sidebar-views/details_partial', $data);
		}
	}
?>