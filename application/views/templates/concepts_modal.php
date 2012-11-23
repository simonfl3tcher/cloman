<form action="" method="post" id="addTaskForm" data-ajaxurl='<?php echo site_url("tasks/add_standard_task_time"); ?>' data-useAjax='true' class="form-horizontal">	
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="concepts-modal" style="display: none;">
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
									<label>Name</label>
									<input type="text" name="concept[Name]" class="" />
								</td>
							</tr>
							<tr>
								<td>
									<label>Notes</label>
									<textarea name="concept[Notes]"></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<label>Files</label>
									<input type="file" id="file" name="userfile" size="20" />
									<div class="dummyfile input-append">
										<input id="filename" type="text" class="input disabled span2" name="userfile" readonly="readonly" />
										<a id="fileselectbutton" class="btn">Choose...</a>
									</div>
									<span><span class="icon plusIconButton" id="addAnotherConceptImage"></span></span>
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