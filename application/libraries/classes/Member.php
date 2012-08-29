<?php 	
	
	class Member_Class extends DataboundObject {

		protected $Title;
		protected $FirstName;
		protected $LastName;
		protected $AddressId;
		protected $EmailAddress;
		protected $Password;
		protected $Url;
		protected $DateAccountCreated;
		protected $Status;
		protected $DisplayName;

		protected function DefineTableName(){
			return("members"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("ID");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"ID" => "ID", 
				"Name_Title" => "Title",
				"Name_First" => "FirstName", 
				"Name_Last" => "LastName",
				"Address_ID" => "AddressId", 
				"Member_Email" => "EmailAddress",
				"Member_Password" => "Password",
				"Member_Url" => "Url",
				"Member_Registered" => "DateAccountCreated",
				"Member_Status" => "Status",
				"Display_Name" => "DisplayName");
		}
	}
?>
