<?php 	
	
	class Project_Class extends DataboundObject {

		protected $BusinessID;
		protected $SalesID;
		protected $ProjectName;
		protected $ManagerID;
		protected $ProjectTypeID;
		protected $StatusID;
		protected $StartDate;
		protected $InternalDeadline;
		protected $ClientDeadline;
		protected $Notes;
		protected $TaskTemplateID;
		protected $Budget;
		protected $Complete;
		protected $CompletionDate;
		protected $OnHold;
		protected $HoldID;

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
				"sales_id" => "SalesID", 
				"project_name" => "ProjectName",
				"manager_id" => "ManagerID",
				"project_type_id" => "ProjectTypeID", 
				"status_id" => "StatusID",
				"start_date" => "StartDate",
				"internal_deadline" => "InternalDeadline",
				"client_deadline" => "ClientDeadline",
				"notes" => "Notes",
				"task_template_id" => "TaskTemplateID",
				"complete" => "Complete",
				"completion_date" => "CompletionDate",
				"on_hold" => "OnHold",
				"hold_id" => "HoldID",
				"budget" => "Budget");
		}
	}
?>
