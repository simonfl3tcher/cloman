<?php 	

	class Pages extends CI_Controller {

		public function view($page = 'home'){
			if(!file_exists('application/views/pages/' . $page . '.php')){
				// we do not have a page for that 
				var_dump($page);
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('templates/header', $data);
			$this->load->view('pages/' . $page, $data);
			$this->load->view('templates/footer', $data);
		}
	}
?>