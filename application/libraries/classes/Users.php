<?php 	
	
	class Users_Class extends DataboundObject {

		protected $Email;
		protected $DisplayName;
		protected $Group;
		protected $Password;

		protected function DefineTableName(){
			return("users"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("user_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"user_id" => "ID",
				"email" => "Email", 
				"display_name" => "DisplayName", 
				"group" => "Group",
				"password" => "Password");
		}
	}
?>
