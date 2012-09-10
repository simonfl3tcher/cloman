<?php 	
	
	class Support_Packs_Class extends DataboundObject {

		protected $Description;
		protected $Includes;
		protected $TimeAllowed;

		protected function DefineTableName(){
			return("support_packs"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("support_packs_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"support_packs_id" => "ID",
				"description" => "Description", 
				"includes" => "Includes", 
				"time_allowed_pm" => "TimeAllowed");
		}
	}
?>
