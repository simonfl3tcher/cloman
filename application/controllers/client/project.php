<?php 
	
	class Project extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isClientAuthorised();
			$this->load->model('projects_model');
			$this->load->model('people_model');
			$this->load->helper('date');
		}

		public function index($id){
			$data['title'] = 'Project Overview | Logic Client';
			$data['project_details'] = $this->projects_model->project_details($id);
			$data['comment_count'] = $this->projects_model->customer_comment_count();
			$this->render_client_view('project/overview', $data);
		}

		public function view($id, $tab = null){
			if($this->request->isPost()){

				$images = '';

				if(isset($_FILES) && !empty($_FILES)){

					$path = 'uploads/concepts/' . $_POST['project_id'] .'/uploads';

					if(!is_dir($path)){
						mkdir($path, 0777, true);
					}
					
					$config['upload_path'] =  $path;
					$config['allowed_types'] = 'exe|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|mid|midi|mp2|mp3|wav|bmp|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);


					$files = array();
					foreach($_FILES as $key => $value){
						if(!empty($value['name'])){
							if($this->upload->do_upload($key)){
								$d = $this->upload->data();
								$files[] = $d['file_name'];
								$data['success'] = 'Your comment has been added against this concept';
							} else {
								// dont upload the files.
								$data['error'] = 'This file did not upload properly, please try again';
							}
						}
					}

					$images = implode('|', $files);
				}
				
				$this->projects_model->add_comment_to_concept($images);
			}

			$data['tab'] = 1;
			
			if(isset($_GET['tab'])){
				$data['tab'] = $_GET['tab'];
			}

			$data['title'] = 'Project Overview | Logic Client';
			$data['project_details'] = $this->projects_model->project_details($id);
			$data['projects'] = $this->projects_model->get_projects_to_person($this->session->userdata('people_id'));
			
			$count = 0;
			foreach($data['projects'] as $proj){
				$c = $this->projects_model->get_comment_count($proj['project_id']);
				$data['projects'][$count]['comment_count'] = $c['count'];
				$count++;
			}

			$data['concepts'] = $this->projects_model->get_concept_data($id);
			$data['comment_full_count'] = $this->projects_model->customer_full_count();
			
			$count = 0;
			foreach($data['concepts'] as $con){
				$data['concepts'][$count]['comms'] = $this->projects_model->get_comments($con['concept_id']);
				$data['concepts'][$count]['images'] = explode('|', $con['images']);
				$count++;

			}
			
			$data['user_data'] = $this->people_model->get($this->session->userdata('people_id'));
			$this->render_client_view('project', $data);
		}

		public function preview($projectId, $image, $tab){
			$data['url'] = site_url() . 'client/project/' . $projectId;
			$data['tab'] = $tab;
			$data['project'] = $projectId;
			$data['image'] = $image;
			$this->render_client_view('client/preview', $data, true);
		}

		public function download($projId, $image){
			$this->load->helper('download');
			$data = file_get_contents("uploads/concepts/" . $projId . "/uploads/" . $image); // Read the file's contents
			$name = $image;
			force_download($name, $data); 
		}

	}

?>