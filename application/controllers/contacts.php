<?php 

	require_once('application/libraries/classes/Contact.php');
	
	class Contacts extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('contact_model');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
		}

		public function index() {
			$data['title'] = 'Contacts Page';
			$data['contact_list'] = $this->contact_model->get();
			$this->load->view('templates/header', $data);
			$this->load->view('contacts/index', $data);
			$this->load->view('templates/footer');
		}

		public function add() {
			if(!$this->request->isAjax()){
				$data['title'] = 'Add Contact';
				$data['countries'] = $this->helper_model->get_countries();
				$data['businesses'] = 'TM Groundworks';

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
				var_dump('You are in the right place');
				var_dump($_POST);
				exit;
				// Do the ajax work here...
				if($this->request->isPost()){
					if($this->contact_model->insert_contact()){
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}
			}
		}

		public function edit($id = null){
			$data['title'] = 'Edit a contact';
			$data['contact'] = new Contact_CLass($id);
			$this->load->view('templates/header', $data);
			$this->load->view('contacts/edit', $data);
			$this->load->view('templates/footer');
		}

		public function delete($id){
			$member = $this->contact_model->deleteContact($id);
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
	}
?>