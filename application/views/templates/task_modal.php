<form action="" method="post" id="addContactForm" data-ajaxurl='<?php echo site_url("tasks/add"); ?>' data-useAjax='true' class="form-horizontal">	
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="task-modal" style="display: none;">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
              <span class="icon taskIcon"></span>
            </div>
            <div class="modal-body">		
            	<div class="addWrapper">
            		<table>
            			<tr class="largeField">
							<td>
								<label for="business_name">Task Name</label>
								<span><input type="text" value="" id="project_name" name="task[Name]"></span>
							</td>
						</tr>
					</table>
					<div class="stdpadh stdpadt">
						<span>Business</span>
					</div>
					<table class="std ">
						<tr class="largeField">
							<td>
								<span>
									<?php 
										$this->db->select('*');
										$this->db->from('businesses');
										$query = $this->db->get();
										$query = $query->result_array();
										$type_options = array();
										$type_options[0] = '';
										foreach($query as $con){
											$type_options[$con['business_id']] = $con['name'];
										}
										$js = 'class="taskBusinessSelector"'; ?>
									<?php echo form_dropdown('task[Business]', $type_options, '', $js); ?>
								</span>
							</td>	
						</tr>
					</table>
					<div class="assigntoproject">
						<p>Assign to project ? </p>
						<p class="content"></p>
					</div>
					<div class="stdpadh stdpadt">
						<span>Assign Task To</span>
					</div>
						
					<table class="std">
						<tr>
							<td>
								<input id="my-text-input" type="text" name="task[Workers]" class="selectWorkers" />
							</td>
						</tr>
					</table>
					<div class="stdpadh stdpadt">
						<span>Dates</span>
					</div>
						
					<table class="std">
						<tr>
							<td>
								<input type="text" name="task[Startdate]" class="datepicker" />
							</td>
							<td>
								<input type="text" name="task[internal-end-date]" class="datepicker" />
							</td>
							<td>
								<input type="text" name="task[external-end-date]" class="datepicker" />
							</td>
						</tr>
					</table>

					<div class="stdpadh stdpadt">
						<span>Task Type</span>
					</div>
					<table class="std ">
						<tr class="largeField">
							<td>
								<span>
									<?php 
										$this->db->select('*');
										$this->db->from('task_type');
										$query = $this->db->get();
										$query = $query->result_array();
										$type_options = array();
										$type_options[0] = '';
										foreach($query as $con){
											$type_options[$con['task_type_id']] = $con['name'];
										}
										$js = 'class="connectionSelection"'; ?>
									<?php echo form_dropdown('task[Type]', $type_options, '', $js); ?>
								</span>
								<span id="addTextbox" class="addConnection icon plusIconGrey">
								</span>
							</td>
							<td class="slide">
								<input class="addConnectionInput" type="text" name="task[Add_type_of_task]" placeholder="New Task Type" />
							</td>
						</tr>
					</table>
					<div class="stdpadh stdpadt">
						<span>Task Status</span>
					</div>
					<table class="std ">
						<tr class="largeField">
							<td>
								<span>
									<?php 
										$this->db->select('*');
										$this->db->from('status_table');
										$query = $this->db->get();
										$query = $query->result_array();
										$type_options = array();
										$type_options[0] = '';
										foreach($query as $con){
											$type_options[$con['status_id']] = $con['name'];
										}
										$js = 'class="connectionSelection"'; ?>
									<?php echo form_dropdown('task[Status]', $type_options, '', $js); ?>
								</span>
							</td>
						</tr>
					</table>


					<div class="stdpadh stdpadt">
						<span>Task Notes</span>
					</div>
						
					<table class="std">
						<tr>
							<td>
								<textarea name="task[Notes]"></textarea>
							</td>
						</tr>
					</table>
				</div>
			</div>
	    <div class="modal-footer">
	    	<div class="resetForm icon resetIcon"></div>
	      <button data-dismiss="modal" type="reset" class="btn">Close</button>
	      <button data-dismiss="modal" type="submit" class="btn btn-primary add">Add Task</button>
	    </div>
	</div>
</form>
<div class="clear"></div>