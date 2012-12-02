<?php 
	
	class Email extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function do_email($to, $from, $fromPerson, $subject, $message){
			$this->load->library('email');

			$this->email->from($from, $fromPerson);
			$this->email->to($to);

			$this->email->subject($subject);
			$this->email->message($message);

			$this->email->send();

			echo $this->email->print_debugger();
		}
	}