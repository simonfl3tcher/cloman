<?php 
	

	class Client_Portal extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isAuthorised();
			$this->load->model('misc');
			$this->load->model('email');
			$this->load->model('people_model');
		}

		public function index(){
			$data['title'] = 'Client Portal Management';
			$data['all_faqs'] = $this->misc->get_all_faqs();
			$data['all_documents'] = $this->misc->get_all_documents();
			$data['people'] = $this->people_model->get_all_with_client_access();
			$this->render_view('management/client_portal_home', $data);
		}

		public function faq($id){
			
			if($this->request->isPost()){
				$this->misc->update_faq($id);
				if(strtolower($_POST['submit']) == 'verify'){
					$user = $this->people_model->get($_POST['faq']['User']);
					$message = 'Your question has been answered by the logic design team, below is their response<br />';
					$message .= '"' . $_POST['faq']['Answer'] . '"'; 
					$this->email->do_email('hello@logicdesign.co.uk', $user['email'], 'Logic Design', 'Question Answered | Logic Design', $message);
				}
				redirect('client_portal', 'refresh');
			}

			$data['title'] = 'FAQ Edit';
			$data['faq_information'] = $this->misc->get_single_faq($id);
			$this->render_view('management/faq_edit', $data);
		}

		public function document($id = null){
			
			if($this->request->isPost()){
				$image = '';
				$file = '';

				if(isset($_FILES['image']) && !empty($_FILES['image'])){
					$path = 'uploads/documents/images';

					$config['upload_path'] =  $path;
					$config['allowed_types'] = 'gif|jpg|png|pdf|txt';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('image');
					
					$image = $this->upload->data();
					$image = $image['file_name'];
				}

				if(isset($_FILES['document']) && !empty($_FILES['document'])){
					$path = 'uploads/documents';

					$config['upload_path'] =  $path;
					$config['allowed_types'] = 'gif|jpg|png|pdf|txt';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('document');

					$file = $this->upload->data();
					$file = $file['file_name'];

				}

				if($id != null){
					$this->misc->update_document($id, $image, $file);
				} else {
					$this->misc->add_document($image, $file);
				}
				redirect('client_portal', 'refresh');
			}

			if($id != null){
				$data['title'] = 'Dcoument Edit';
				$data['document_info'] = $this->misc->get_single_document($id);
			} else {
				$data['title'] = 'Add Document';
			}
			$this->render_view('management/document_edit', $data);
		}

		public function disable_client($id){
			$this->people_model->disable_portal_access($id);
		}
	}