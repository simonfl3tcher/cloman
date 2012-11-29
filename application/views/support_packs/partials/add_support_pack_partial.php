<form action="" method="post" id="addTaskForm" data-ajaxurl='<?php echo site_url("support_packs/add"); ?>' data-useAjax='true' class="form-horizontal">	
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="support_pack-modal" style="display: none;">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
              <span class="icon taskIcon"></span>
            </div>
            <div class="modal-body">		
            	<div class="addWrapper">
            		<table>
            			<tr class="largeField">
							<td>
								<label for="business_name">Name</label>
								<span><input type="text" value="" id="reminder_name" name="support[Name]"></span>
							</td>
							<td>
								<label for="business_name">Price</label>
								<div class="input-prepend input-append">
							   		<span class="add-on">&pound;</span><input name="support[Price]" class="span2" id="appendedPrependedInput" size="16" type="text"><span class="add-on">.00</span>
							    </div>
							</td>
						</tr>
						<tr>
							<td>
								<label for="business_name">Support Time</label>
								<input type="text" class="addTime" placeholder="00:00:00" value="00:00:00" name="support[Time]" />
							</td>
						</tr>
					</table>
					<table>
            			<tr class="largeField">
							<td>
								<label for="business_name">Short Description (255 Characters)</label>
								<span><textarea name="support[Description]" style="width: 439px; height: 50px;"></textarea></span>
							</td>
						</tr>
					</table>
					<table>
            			<tr class="largeField">
							<td>
								<label for="business_name">Includes</label>
								<span><textarea name="support[Includes]" style="width: 438px; height: 200px;"></textarea></span>
							</td>
						</tr>
					</table>
					<table>
            			<tr class="largeField">
							<td>
								<label for="business_name">Client Description</label>
								<span><textarea name="support[Client]" style="width: 438px; height: 200px;"></textarea></span>
							</td>
						</tr>
					</table>
				</div>
			</div>
	    <div class="modal-footer">
	    	<div class="resetForm icon resetIcon"></div>
	      <button data-dismiss="modal" type="reset" class="btn">Close</button>
	      <button data-dismiss="modal" type="submit" class="btn btn-primary add">Add New Support Pack</button>
	    </div>
	</div>
</form>