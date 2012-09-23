<?php 	
	
	class Business_Class extends DataboundObject {

		protected $Name;
		protected $AddressID;
		protected $Phone;
		protected $Email;
		protected $Disabled;

		protected function DefineTableName(){
			return("businesses"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("business_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"business_id" => "ID", 
				"address_id" => "AddressID", 
				"name" => "Name",
				"phone" => "Phone",
				"email" => "Email",
				"disabled" => "Disabled");
		}
	}
?>
