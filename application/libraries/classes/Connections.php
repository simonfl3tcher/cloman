<?php 	
	
	class Connections_Class extends DataboundObject {

		protected $WebsiteID;
		protected $connectionOptionsID;
		protected $Username;
		protected $Password;
		protected $IP;
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
				"website_id" => "WebsiteID", 
				"connection_options_id" => "connectionOptionsID", 
				"username" => "Username",
				"password" => "Password",
				"ip" => "IP",
				"notes" => "Notes");
		}
	}
?>
