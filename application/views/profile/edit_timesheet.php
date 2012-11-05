<form action="" method="post">
	<table>
		<tr class="largeField">
			<td>
				<label for="business_name">Amount Of Time</label>
				<span><input type="text" id="reminder_name" name="timesheet[Time]" value="<?php echo $info->secToTime; ?>" placeholder="00:00:00"></span>
			</td>
			<td>
				<label>Date</label>
				<input type="text" name="timesheet[Date]" class="datepickerFull" value="<?php echo $info->CompletionDate; ?>" />
			</td>
		</tr>
	</table>
	<?php if($info->business_id != null){ ?>
	<table class="std">
		<tr>
			<td>
				<label for="business_name">Business</label>
				<span>
					<?php 
						$this->db->select('*');
						$this->db->from('businesses');
						$this->db->where('disabled', 'N');
						$query = $this->db->get();
						$query = $query->result_array();
						$type_options = array();
						$type_options[0] = '';
						foreach($query as $con){
							$type_options[$con['business_id']] = $con['name'];
						}
						$js = 'class="timesheetBusinessSelector" disabled="disabled"'; ?>
					<?php echo form_dropdown('timesheet[Business]', $type_options, $info->business_id, $js); ?>
				</span>
			</td>
			<td>
			</td>
		</tr>
	</table>
	<?php } ?>
	<table class="std">
		<tr>
			<td>
				<label for="business_name">Project</label>
				<span>
					<?php 
						$this->db->select('*');
						$this->db->from('projects');
						$this->db->where('complete', 'N');
						$query = $this->db->get();
						$query = $query->result_array();
						$type_options = array();
						$type_options[0] = '';
						foreach($query as $con){
							$type_options[$con['project_id']] = $con['project_name'];
						}
						$js = 'class="timesheetProjectSelector" disabled="disabled"'; ?>
					<?php echo form_dropdown('timesheet[Project]', $type_options, $info->project_id, $js); ?>
				</span>
			</td>
			<td>
				<label for="business_name">Task</label>
					<span>
					<?php 
						$this->db->select('*');
						$this->db->from('tasks');
						$this->db->where('project_id', $info->project_id);
						$query = $this->db->get();
						$query = $query->result_array();
						$type_options = array();
						$type_options[0] = '';
						foreach($query as $con){
							$type_options[$con['task_id']] = $con['name'];
						}
						$js = 'id="appendProjectTasks" disabled="disabled"'; ?>
					<?php echo form_dropdown('timesheet[Task]', $type_options, $info->task_id, $js); ?>
				</span>
			</td>
		</tr>
	</table>
	<input type="submit" name="submit" value="Update Time" class="btn"/>
</form>