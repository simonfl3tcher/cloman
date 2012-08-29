<?php 
	
	class Blog_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get_posts(){
			return true;
		}
	}
?>