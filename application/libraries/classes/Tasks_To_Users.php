<?php 	
	
	class Tasks_To_Users_Class extends DataboundObject {

		protected $UserID;
		protected $TaskID;

		protected function DefineTableName(){
			return("tasks_to_users"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("task_to_user_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"task_to_user_id" => "ID",
				"task_id" => "TaskID",
				"user_id" => "UserID");
		}
	}
?>
