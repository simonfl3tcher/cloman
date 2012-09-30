<?php 	
	
	class Project_To_Users_Class extends DataboundObject {

		protected $UserID;
		protected $ProjectID;

		protected function DefineTableName(){
			return("project_to_users"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("users_to_project_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"users_to_project_id" => "ID",
				"user_id" => "UserID",
				"project_id" => "ProjectID");
		}
	}
?>
