<?php 	
	
	class Connections_Class extends DataboundObject {
		
		protected $BusinessID;
		protected $Solution;
		protected $Url;
		protected $Username;
		protected $Password;

		protected function DefineTableName(){
			return("connections"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("Connection_ID"); // Name of the primary id of the table
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"Connection_ID" => "ID", 
				"Business_ID" => "BusinessID", 
				"Solution" => "Solution",
				"Url" => "Url", 
				"Username" => "Username",
				"Password" => "Password");
		}
	}
?>
