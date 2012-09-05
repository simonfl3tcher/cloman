<?php 	
	
	class Address_Class extends DataboundObject {
		
		protected $ID;
		protected $AddressLine1;
		protected $AddressLine2;
		protected $AddressLine3;
		protected $City;
		protected $Region;
		protected $CountryID;
		protected $Postcode;

		protected function DefineTableName(){
			return("address"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("Address_ID");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"Address_ID" => "ID", 
				"Address_Line_1" => "AddressLine1", 
				"Address_Line_2" => "AddressLine2",
				"Address_Line_3" => "AddressLine3", 
				"City" => "City",
				"Region_Name" => "Region",
				"Country_ID" => "CountryID",
				"Postcode" => "Postcode");
		}
	}
?>
