<?php 	
	
	class Support_Packs_to_businesses_Class extends DataboundObject {

		protected $BusinessID;
		protected $SupportPackID;
		protected $Reminder;
		protected $ReminderDate;

		protected function DefineTableName(){
			return("support_packs_to_businesses"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("sptb_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"sptb_id" => "ID",
				"businesses_id" => "BusinessID", 
				"support_pack_id" => "SupportPackID", 
				"reminder" => "Reminder",
				"reminder_when" => "ReminderDate");
		}
	}
?>
