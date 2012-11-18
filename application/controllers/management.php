<?php 
	
	class Management extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isAuthorised();
			$this->load->model('task_model');
		}

		public function index(){
			$data['title'] = ucfirst('Project Management');
			$data['task_statuses'] = $this->task_model->get_list_of_status();
			$this->render_view('management/home', $data);
		}

		public function show_tables(){

			$query = $this->db->query("SHOW tables");
			$query = $query->result_array();

			$dropArray = array();

			foreach($query as $array => $database){
				foreach($database as $db => $table){
					$dropArray[$table] = ucwords(str_replace('_', ' ' , $table));
				}
			}

			return $dropArray;
		}

		public function export(){

			$data['tables_array'] = $this->show_tables();


			if($this->request->isPost()){
				$this->load->dbutil();
				$this->load->helper('file');
				$this->load->helper('download');
				$table = $_POST['export'];
				$query = $this->db->query("SELECT " . implode(', ', $_POST['cols']) . " FROM {$table}");
				$delimiter = $_POST['delimiter'];
				$newline = "\r\n";

				$data = $this->dbutil->csv_from_result($query, $delimiter, $newline); 

				force_download('export-' . $table . '-' . date('d-M-Y', strtotime('today')) . '.csv', $data); 
			}

			$data['title'] = "Export Data";
			$this->render_view('management/export', $data);
		}

		public function get_columns($table){
			$query = $this->db->query("SHOW COLUMNS FROM {$table}");
			$query = $query->result_array();
			$fields = array();

			foreach($query as $q){
				$fields[] = $q['Field'];
			}

			echo json_encode($fields);
		}

		public function import(){

			$this->load->model('file_model');
			$this->load->helper('file');
			$data['tables_array'] = $this->show_tables();

		    if($this->request->isPost()){
		    	$table = $_POST['importDatabase'];
		    	$primary = $_POST['primary'];
		    	$config['upload_path'] = 'files/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload()){
					$data['error'] = $this->upload->display_errors();
				} else {
					$file = $this->upload->data();
			    	// do the importing here!!
					$this->load->library('csvreader');  
		    
				    $filePath = base_url() . 'files/' . $file['file_name'];  
				  
				    $d = $this->csvreader->parse_file($filePath);
				    delete_files('files/');
				    foreach($d as $key => $value){
				    	$d[trim($key)] = $value;
				    }
				    if($this->file_model->import($table, $primary, $d)){
				    	$this->session->set_flashdata('successful_import', 'Successful, ' . count($d) . ' rows were imported!');
				    	redirect('management/import');
				    } else {
				    	$this->session->set_flashdata('error_importing', 'There seems to be an error please try again');
				    	redirect('management/import');
				    }
				}
		    }

		    $data['title'] = 'Import Data';
		    $this->render_view('management/import', $data);  
		}

		public function backup(){
			$this->load->library('zip');
			$path = '/';

			$this->zip->read_dir($path);

			// Download the file to your desktop. Name it "my_backup.zip"
			$this->zip->download('reason_backup.zip'); 
		}

		public function update_task_statuses(){
			if($this->request->isPost()){
				$this->task_model->update_task_statuses();
				redirect('/management', 'refresh');
			}
		}
	}

?>