<?php 

	require_once('application/libraries/classes/People.php');
	
	class Contacts extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('contact_model');
			$this->load->model('business_model');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
		}

		public function index() {
			$data['title'] = 'Contacts Page';
			$data['contact_list'] = $this->contact_model->get();
			$data['business'] = $this->business_model->get();
			$this->load->view('templates/header', $data);
			$this->load->view('contacts/index', $data);
			$this->load->view('templates/footer');
		}

		public function add() {
			if(!$this->request->isAjax()){
				$data['title'] = 'Add Contact';
				$data['countries'] = $this->helper_model->get_countries();

				$this->form_validation->set_rules('contact[Name_First]', 'First Name', 'trim|required');
				$this->form_validation->set_rules('contact[Name_Last]', 'Last Name', 'trim|required');
				$this->form_validation->set_rules('contact[Email]', 'Email Address', 'trim|required|valid_email');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]|callback_password_check');
				if($this->request->isPost() && $this->form_validation->run()){
					if($this->contact_model->insert_contact()){
						redirect('/contacts', 'refresh');
					}
				}

				$this->load->view('templates/header', $data);
				$this->load->view('contacts/add', $data);
				$this->load->view('templates/footer');
			} else {
				$this->contact_model->insert_contact();
			}
		}

		public function edit($id = null){
			$data['title'] = 'Edit a contact';
			$data['contact'] = new People_CLass($id);
			$this->load->view('templates/header', $data);
			$this->load->view('contacts/edit', $data);
			$this->load->view('templates/footer');
		}

		public function delete($id){
			$member = $this->contact_model->delete_contact($id);
			redirect('/contacts', 'refresh');
		}

		public function password_check($str){
			if ($str === $_POST['confirmpass']){
				return TRUE;
			} else {
				$this->form_validation->set_message('password_check', 'The Password fields do not match');
				return FALSE;
			}
		}

		public function ajax() {
			var_dump($_POST);
			if($this->request->isPost()){
				var_dump('true');
			} else {
				var_dump('false');
			}
		}

		public function search(){
			$data = $_POST['data'];
			if($this->request->isPost()){
				echo $this->contact_model->search_contact($data);
			} else {
				return false;
			}
		}

		public function details($contactId){
			$data['contact_details'] = $this->contact_model->contact_deatils($contactId);
			$data['title'] = 'Contact Details';
			$this->load->partial('contacts/partials/details_partial', $data);
		}
	}
?>