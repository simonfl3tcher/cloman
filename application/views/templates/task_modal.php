<form action="" method="post" id="addContactForm" data-ajaxurl='<?php echo base_url("tasks/add"); ?>' data-useAjax='true' class="form-horizontal">	
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
								<label for="business_name">Project Name</label>
								<span><input type="text" value="" id="project_name" name="project[Name]"></span>
							</td>
						</tr>
					</table>
					<div class="stdpadh stdpadt">
						<span>Business</span>
					</div>
						
					<table class="std">
						<tr>
							<td>
								<input id="my-text-input" type="text" name="project[Business]" class="selectBusinesses" />
							</td>
						</tr>
					</table>
					<div class="stdpadh stdpadt">
						<span>Assign Task To</span>
					</div>
						
					<table class="std">
						<tr>
							<td>
								<input id="my-text-input" type="text" name="project[Workers]" class="selectWorkers" />
							</td>
						</tr>
					</table>
					<div class="stdpadh stdpadt">
						<span>Dates</span>
					</div>
						
					<table class="std">
						<tr>
							<td>
								<input type="text" name="project[Startdate]" class="datepicker" />
							</td>
							<td>
								<input type="text" name="project[internal-end-date]" class="datepicker" />
							</td>
							<td>
								<input type="text" name="project[external-end-date]" class="datepicker" />
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
										$js = 'class="connectionSelection"'; ?>
									<?php echo form_dropdown('connection[Type_of_connection]', $type_options, '', $js); ?>
								</span>
								<span id="addTextbox" class="addConnection icon plusIconGrey"></span>
							</td>
							<td class="slide">
								<input class="addConnectionInput" type="text" name="connection[Add_type_of_connection]" placeholder="Add new connection type" />
							</td>
						</tr>
					</table>


					<div class="stdpadh stdpadt">
						<span>Project Notes</span>
					</div>
						
					<table class="std">
						<tr>
							<td>
								<textarea name="project[Notes]"></textarea>
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