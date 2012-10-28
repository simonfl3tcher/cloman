<?php 	

	class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->isAuthorised();
		$this->load->model('news_model');
		$this->load->library('form_validation');

	}

	public function index(){
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'News Archive';

		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug){
		$data['news_item'] = $this->news_model->get_news($slug);

		if(empty($data['news_item'])){
			show_404();
		}

		$data['title'] = $data['news_item']['title'];

		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer');
	}

	public function create(){
		$data['title'] = 'Create a news item';

		$this->form_validation->set_rules('title', 'Title', 'required'); // set_rules takes three arguments - name of the input field, The name to be used in the put fields, and the rule.
		$this->form_validation->set_rules('text', 'text', 'required');

		if($this->form_validation->run() === false){
			$this->load->view('templates/header', $data);
			$this->load->view('news/create');
			$this->load->view('templates/footer');
		} else {
			$this->news_model->set_news();
			self::index();
		}
	}
}