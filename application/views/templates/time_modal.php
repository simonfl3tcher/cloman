<form action="" method="post" id="addTaskForm" data-ajaxurl='<?php echo site_url("tasks/add_time"); ?>' data-useAjax='true' class="form-horizontal">	
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="time-modal" style="display: none;">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
              <span class="icon taskIcon"></span>
            </div>
            <div class="modal-body">		
            	<div class="addWrapper">
            		<table>
            			<tr class="largeField">
							<td>
								<label for="business_name">Amount Of Time</label>
								<span><input type="text" id="reminder_name" name="timesheet[Time]" value="00:00:00" placeholder="00:00:00"></span>
							</td>
							<td>
								<label>Date</label>
								<input type="text" name="timesheet[Date]" class="datepickerFull" />
							</td>
						</tr>
					</table>
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
										$js = 'class="timesheetBusinessSelector"'; ?>
									<?php echo form_dropdown('timesheet[Business]', $type_options, '', $js); ?>
								</span>
							</td>
							<td>
							</td>
						</tr>
					</table>
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
										$js = 'class="timesheetProjectSelector"'; ?>
									<?php echo form_dropdown('timesheet[Project]', $type_options, '', $js); ?>
								</span>
							</td>
							<td>
								<label>Task</label>
								<select name="timesheet[Task]" id="appendProjectTasks">
									<options></options>
								</select>
							</td>
						</tr>
					</table>
				</div>
			</div>
	    <div class="modal-footer">
	    	<div class="resetForm icon resetIcon"></div>
	      <button data-dismiss="modal" type="reset" class="btn">Close</button>
	      <button data-dismiss="modal" type="submit" class="btn btn-primary add">Add Time</button>
	    </div>
	</div>
</form>