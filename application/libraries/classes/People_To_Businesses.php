<?php 	
	class People_To_Businesses extends DataboundObject {

		protected $PeopleID;
		protected $BusinessID;
		protected $PrimaryContact;

		protected function DefineTableName(){
			return("people_to_businesses"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("ptb_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"ptb_id" => "ID", 
				"people_id" => "PeopleID", 
				"business_id" => "BusinessID",
				"primary_contact" => "PrimaryContact");
		}
	}
?>
