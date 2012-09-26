<?php 	
	
	class Connections_Class extends DataboundObject {

		protected $BusinessID;
		protected $ConnectionOptionsID;
		protected $Username;
		protected $UsernameTwo;
		protected $Password;
		protected $Url;
		protected $Notes;

		protected function DefineTableName(){
			return("connections"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("connection_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"connection_id" => "ID",
				"business_id" => "BusinessID", 
				"connection_options_id" => "ConnectionOptionsID", 
				"username" => "Username",
				"username_two" => "UsernameTwo",
				"password" => "Password",
				"url" => "Url",
				"notes" => "Notes");
		}
	}
?>
