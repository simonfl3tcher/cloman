<form action="" method="post" id="addContactForm" data-ajaxurl='<?php echo base_url("projects/add"); ?>' data-useAjax='true' class="form-horizontal">	
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="myModal" style="display: none;">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
              <span class="icon projectIcon"></span>
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
					<table>
            			<tr class="largeField">
							<td>
								<label for="business_name" class="above">Project Type</label>
								<span>
									<?php $js = 'class="connectionSelection"'; ?>
									<?php echo form_dropdown('project[Type]', $type_options, '', $js); ?>
								</span>
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
						<span>Project Manager</span>
					</div>
						
					<table class="std">
						<tr>
							<td>
								<input id="my-text-input" type="text" name="project[Manager]" class="selectManagers" />
							</td>
						</tr>
					</table>
					<div class="stdpadh stdpadt">
						<span>Project Cost</span>
					</div>
					<div class="input-prepend input-append">
				   		<span class="add-on">&pound;</span><input name="project[Cost]" class="span2" id="appendedPrependedInput" size="16" type="text"><span class="add-on">.00</span>
				    </div>
					<div class="stdpadh stdpadt">
						<span>Sold By</span>
					</div>
						
					<table class="std">
						<tr>
							<td>
								<input id="my-text-input" type="text" name="project[Salesman]" class="selectSalesman" />
							</td>
						</tr>
					</table>
					<div class="stdpadh stdpadt">
						<span>Assign Project To</span>
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

					<table>
            			<tr class="largeField">
							<td>
								<label for="business_name" class="above">Project Status</label>
								<span>
									<?php $js = 'class="connectionSelection"'; ?>
									<?php echo form_dropdown('project[Status]', $status_options, '', $js); ?>
								</span>
							</td>
						</tr>
					</table>

					<div class="stdpadh stdpadt">
						<span>Project Notes</span>
					</div>
						
					<table class="std">
						<tr>
							<td>
								<textarea name="project[Notes]" style="width:100%"></textarea>
							</td>
						</tr>
					</table>


					<br />		
				</div>
			</div>
	    <div class="modal-footer">
	    	<div class="resetForm icon resetIcon"></div>
	      <button data-dismiss="modal" type="reset" class="btn">Close</button>
	      <button data-dismiss="modal" type="submit" class="btn btn-primary add">Start Project</button>
	    </div>
	</div>
</form>
<div class="clear"></div>