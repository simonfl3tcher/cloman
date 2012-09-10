<?php 	
	
	class Connection_Options_Class extends DataboundObject {

		protected $Name;

		protected function DefineTableName(){
			return("connection_options"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("connection_options_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"connection_options_id" => "ID",
				"name" => "Name");
		}
	}
?>
