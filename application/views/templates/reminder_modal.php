<form action="" method="post" id="addTaskForm" data-ajaxurl='<?php echo site_url("reminder/add"); ?>' data-useAjax='true' class="form-horizontal">	
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="reminder-modal" style="display: none;">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
              <span class="icon taskIcon"></span>
            </div>
            <div class="modal-body">		
            	<div class="addWrapper">
            		<table>
            			<tr class="largeField">
							<td>
								<label for="business_name">Reminder Name</label>
								<span><input type="text" value="" id="reminder_name" name="reminder[Name]"></span>
							</td>
						</tr>
					</table>
					<div class="stdpadh stdpadt">
						<span>Reminder Time</span>
					</div>
					<div class="TimeOptions">
						<table class="std">
							<tr>
								<td>
									<input type="text" name="reminder[Date]" class="datepicker" />
								</td>
								<td>
									<select name="reminder[Time]">
						  <?php $starttime = '07:00:00';
								$time = new DateTime($starttime);
								$interval = new DateInterval('PT30M');
								$temptime = $time->format('H:i:s');

								do {
								   echo '<option>' . $temptime . '</option>';
								   $time->add($interval);
								   $temptime = $time->format('H:i:s');
								} while ($temptime !== $starttime);
							?>
						</select>
								</td>
							</tr>
						</table>
					</div>
					<table>
            			<tr class="largeField">
							<td>
								<label for="business_name">Reminder Text</label>
								<span><textarea name="reminder[Text]"></textarea></span>
							</td>
						</tr>
					</table>
					<div class="stdpadh stdpadt">
						<span>Who to remind ?</span>
					</div>
						
					<table class="std">
						<tr>
							<td>
								<input id="my-text-input" type="text" name="reminder[People]" class="selectAllWorkers" />
							</td>
						</tr>
					</table>
					
				</div>
			</div>
	    <div class="modal-footer">
	    	<div class="resetForm icon resetIcon"></div>
	      <button data-dismiss="modal" type="reset" class="btn">Close</button>
	      <button data-dismiss="modal" type="submit" class="btn btn-primary add">Add Reminder</button>
	    </div>
	</div>
</form>