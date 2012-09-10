<?php 	
	
	class Projects_Class extends DataboundObject {

		protected $BusinessID;
		protected $ProjectManager;
		protected $Status;
		protected $ProjectType;
		protected $ProjectPeople;
		protected $ProjectUsers;
		protected $ClientDeadline;
		protected $Budget;

		protected function DefineTableName(){
			return("projects"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("project_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"project_id" => "ID",
				"business_id" => "BusinessID", 
				"project_manager" => "ProjectManager", 
				"status" => "Status",
				"project_type" => "ProjectType",
				"project_people" => "ProjectPeople",
				"project_users" => "ProjectUsers",
				"client_deadline" => "ClientDeadline",
				"budget" => "Budget");
		}
	}
?>
