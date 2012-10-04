<?php 	
	
	class Task_Type_Class extends DataboundObject {

		protected $Name;

		protected function DefineTableName(){
			return("task_type"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("task_type_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"task_type_id" => "ID",
				"name" => "Name");
		}
	}
?>
