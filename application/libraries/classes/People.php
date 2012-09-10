<?php 	
	class People_Class extends DataboundObject {

		protected $Name;
		protected $BusinessID;
		protected $Role;
		protected $Email;
		protected $Phone;
		protected $Notes;
		protected $IsPrimaryContact;

		protected function DefineTableName(){
			return("people"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("people_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"people_id" => "ID", 
				"business_id" => "BusinessID",
				"name" => "Name", 
				"role" => "Role",
				"email" => "Email", 
				"phone" => "Phone",
				"notes" => "Notes",
				"is_primary_contact" => "IsPrimaryContact");
		}
	}
?>
