<?php 	
	
	class Contact_Class extends DataboundObject {

		protected $FirstName;
		protected $LastName;
		protected $AddressId;
		protected $EmailAddress;
		protected $Password;
		protected $Url;
		protected $DateAccountCreated;
		protected $Status;
		protected $Level;
		protected $DisplayName;
		protected $Notes;

		protected function DefineTableName(){
			return("contacts"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("ID");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"ID" => "ID", 
				"Name_First" => "FirstName", 
				"Name_Last" => "LastName",
				"Address_ID" => "AddressId", 
				"Contact_Email" => "EmailAddress",
				"Contact_Password" => "Password",
				"Contact_Url" => "Url",
				"Contact_Registered" => "DateAccountCreated",
				"Contact_Status" => "Status",
				"Contact_Level" => "Level",
				"Display_Name" => "DisplayName",
				"Notes" => "Notes");
		}
	}
?>
