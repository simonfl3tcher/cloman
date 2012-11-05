<?php 
	

	class profile_model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get_tasksheets(){
			$sql = "SELECT t.`name`, tt.`task_timesheet_id`, SEC_TO_TIME(tt.task_total_time) as secToTime, DATE_FORMAT(tt.completion_date, '%d/%m/%Y') as CompletionDate from task_timesheets as tt 
inner join tasks as t on t.`task_id` = tt.`task_id`
where user_id = 1 and `status` = 'C'
order by CompletionDate desc";
			$query = $this->db->query($sql, array($this->session->userdata('user_id')));
			return $query->result_array();
		}

		public function remove_users_time($task_time_id){
			 $this->db->delete('task_timesheets', array('task_timesheet_id' => $task_time_id)); 
			 return true;
		}

		public function get_task_time_details($id){
			$sql = "SELECT b.business_id, p.`project_id`, t.`task_id`, tt.`task_timesheet_id`, SEC_TO_TIME(tt.task_total_time) as secToTime, DATE_FORMAT(tt.completion_date, '%d-%m-%Y') as CompletionDate
from `task_timesheets` as tt
left join tasks as t on tt.`task_id` = t.`task_id`
left join projects as p on p.`project_id` = t.`project_id`
left join businesses as b on b.`business_id` = t.business_id
where tt.task_timesheet_id = ?";
			$query = $this->db->query($sql, $id);
			return $query->row();
		}

		public function update_timesheet($id){
			$hours = date('H:i:s', strtotime('now'));
			$mydate = $_POST["timesheet"]["Date"];
			//Date formated as dd-mm-yyyy
			list($d, $m, $y) = preg_split('/\-/', $mydate);

			$mydate = sprintf('%4d-%02d-%02d', $y, $m, $d);
			$data = array(

				'task_total_time' => time_to_sec($_POST['timesheet']['Time']),
				'completion_date' => $mydate . ' ' . $hours
			);
			$this->db->where('task_timesheet_id', $id);
			$this->db->update('task_timesheets', $data);
			return true;
		}

	}
?>