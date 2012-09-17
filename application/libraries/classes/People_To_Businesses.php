<?php 	
	class Business_To_People extends DataboundObject {

		protected $PeopleID;
		protected $BusinessID;
		protected $PrimaryContact;

		protected function DefineTableName(){
			return("business_to_people"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("ptb_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"b2p_id" => "ID", 
				"people_id" => "PeopleID", 
				"business_id" => "BusinessID");
		}
	}
?>
