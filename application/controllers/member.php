<?php 

	class Member extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->isAuthorised();
			$this->load->model('member_model');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
		}

		public function index() {
			if($this->session->userdata('Logged_In')){
				$data['title'] = 'This is the members area';
				$this->load->view('templates/header', $data);
				$this->load->view('member/index', $data);
				$this->load->view('templates/footer');
			} else {
				redirect('/member/login', 'refresh');
			}
		}

		public function login() {
			$direct = isset($_REQUEST['direct']) && !empty($_REQUEST['direct']) ? $_REQUEST['direct'] : $this->request->uriForDirect();

			if($this->request->isPost()){
				$results = $this->member_model->login();
				if($results->num_rows == 1){
					$this->session->set_userdata('Logged_In', true);
					redirect('/member', 'refresh');
				} else {
					$data['error'] = 'Your username / password do not match. please try again';
				}
			} 
			if(!$this->session->userdata('Logged_In')){
				$data['title'] = 'Member Login Page';
				$this->load->view('templates/header', $data);
				$this->load->view('member/login', $data);
				$this->load->view('templates/footer', $data);
			} else {
				redirect('/member', 'refresh');
			}
		}

		public function register() {			
			$data['title'] = 'Member Register Page';
			$data['countries'] = $this->member_model->get_countries();

			$this->form_validation->set_rules('contact[Name_First]', 'First Name', 'trim|required');
			$this->form_validation->set_rules('contact[Name_Lst]', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('contact[Email]', 'Email Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('contact[Display_Name]', 'Display Name', 'trim|required');
			$this->form_validation->set_rules('address[Address_Line_1]', 'Address Line 1', 'trim|required');
			$this->form_validation->set_rules('address[Address_Line_2]', 'Address Line 2', 'trim|required');
			$this->form_validation->set_rules('address[City]', 'City', 'trim|required');
			$this->form_validation->set_rules('address[County]', 'County', 'trim|required');
			$this->form_validation->set_rules('address[Postcode]', 'Postcode', 'trim|required');
			$this->form_validation->set_rules('agree', 'Agree the terms', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]|callback_password_check');
			if($this->request->isPost() && $this->form_validation->run()){
				$this->member_model->insert_member();
				$results = $this->member_model->login();
				if($results->num_rows == 1){
					$this->session->set_userdata('Logged_In', true);
					redirect('/member', 'refresh');
				}
			}
			$this->load->view('templates/header', $data);
			$this->load->view('member/register', $data);
			$this->load->view('templates/footer', $data);
		}

		public function logout(){
			$this->session->unset_userdata('Logged_In');
			redirect('/', 'refresh');
		}

		public function password_check($str){
			if ($str === $_POST['confirmpass']){
				return TRUE;
			} else {
				$this->form_validation->set_message('password_check', 'The Password fields do not match');
				return FALSE;
			}
		}
	}
?>