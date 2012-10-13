<?php 	
	
	class Reminder_Class extends DataboundObject {

		protected $Name;
		protected $Text;
		protected $ReminderTime;
		protected $Remindee;

		protected function DefineTableName(){
			return("reminders"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("reminder_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"reminder_id" => "ID", 
				"reminder_time" => "ReminderTime", 
				"name" => "Name",
				"text" => "Text",
				"remindee" => "Remindee");
		}
	}
?>