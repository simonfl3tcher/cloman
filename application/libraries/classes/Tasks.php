<?php 	
	
	class Tasks_Class extends DataboundObject {

		protected $AssignTo;
		protected $TaskTypeID;
		protected $Start;
		protected $EstCompletion;
		protected $Task;
		protected $Notes;
		protected $Complete;
		protected $ProjectID;

		protected function DefineTableName(){
			return("tasks"); //Name of the table you want to use.
		}

		protected function DefineTableID(){
			return("task_id");
		}

		protected function DefineRelationMap(){
			// List out the columns in the database inline with the variables
			// The variables have to match up through the two pages. 
			return array(
				"task_id" => "ID",
				"assign_to" => "AssignTo", 
				"task_type_id" => "TaskTypeID", 
				"start" => "Start",
				"est_completion" => "EstCompletion",
				"task" => "Task", 
				"notes" => "Notes", 
				"complete" => "Complete",
				"project_id" => "ProjectID",
				);
		}
	}
?>
