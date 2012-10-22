<form action="" method="post" id="addTaskForm" data-ajaxurl='<?php echo site_url("tasks/add_standard_task_time"); ?>' data-useAjax='true' class="form-horizontal">	
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="add-time-modal" style="display: none;">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
              <span class="icon taskIcon"></span>
            </div>
            <div class="modal-body">		
            	<div class="addWrapper">
					<div class="TimeOptions">
						<table class="std">
							<tr>
								<td>
									<label>Reminder Date</label>
									<input type="text" name="time[Date]" class="datepickerback" />
								</td>
								<td>
									<label>Reminder Time in hours</label>
									<input type="text" name="time[AmountOfTime]" />
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
	    <div class="modal-footer">
	    	<div class="resetForm icon resetIcon"></div>
	      <button data-dismiss="modal" type="reset" class="btn">Close</button>
	      <button data-dismiss="modal" type="submit" class="btn btn-primary add">Add Time</button>
	    </div>
	</div>
</form>