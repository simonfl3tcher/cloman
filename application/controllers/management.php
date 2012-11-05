<?php 
	
	class Management extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isAuthorised();
		}

		public function index(){
			$data['title'] = ucfirst('Project Management');
			$this->render_view('pages/management', $data);
		}

		public function export(){

			$query = $this->db->query("SHOW tables");
			$query = $query->result_array();

			$dropArray = array();

			foreach($query as $array => $database){
				foreach($database as $db => $table){
					$dropArray[$table] = ucwords(str_replace('_', ' ' , $table));
				}
			}

			$data['tables_array'] = $dropArray;


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
			$this->render_view('management/export.php', $data);
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
			var_dump('you can import a file here if you would like');
			exit;
		}
	}

?>