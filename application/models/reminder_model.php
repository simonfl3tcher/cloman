<?php 

	require_once('application/libraries/classes/Reminder.php');

	class Reminder_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function add_reminder(){

			$remindees = explode(',', $_POST['reminder']['People']);

			foreach($remindees as $rem){
				$reminder = new Reminder_Class();
				$reminder->setName($_POST['reminder']['Name']);
				$reminder->setReminderTime(date('Y-m-d H:i:s', strtotime($_POST['reminder']['Date'] . ' ' . $_POST['reminder']['Time'])));
				$reminder->setText($_POST['reminder']['Text']);
				$reminder->setRemindee($rem);
				$reminder->save();	
			}
		}
	}
?>