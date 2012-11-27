<?php 
	

	class Concepts extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('projects_model');
			$this->load->helper('date');
		}

		public function add_comment(){
			if($this->request->isPost()){

				if(isset($_FILES) && !empty($_FILES)){

					$path = 'uploads/concepts/' . $_POST['project_id'] .'/uploads';

					if(!is_dir($path)){
						mkdir($path, 0777, true);
					}
					
					$config['upload_path'] =  $path;
					$config['allowed_types'] = 'gif|jpg|png';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);


					$files = array();
					foreach($_FILES as $key => $value){
						if(!empty($value['name'])){
							if($this->upload->do_upload($key)){
								$files[] = $this->upload->data();
							} else {
								var_dump('There seems to have been an error uploading some of the images, please try again');
							}
						}
					}

					$images = '';
					$images = implode('|', $files);
					var_dump($images);
					exit;
				}
			}

			$this->projects_model->add_comment_to_concept();
			$data['comms'] = $this->projects_model->get_comments($_POST['concept']);
			echo $this->load->partial('partials/client_comments_partial.php', $data);
		}

		public function client_seen($id){
			$this->projects_model->client_seen($id);
			return true;
		}
	}