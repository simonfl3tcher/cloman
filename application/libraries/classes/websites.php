<?php 	
	
	class Websites_Class extends DataboundObject {

		protected $BusinessID;
		protected $Url;

		protected function DefineTableName(){
			return("websites"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("website_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"website_id" => "ID",
				"business_id" => "BusinessID", 
				"url" => "Url");
		}
	}
?>
