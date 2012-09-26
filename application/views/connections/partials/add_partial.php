<form action="" method="post" id="addContactForm" data-ajaxurl='<?php echo base_url("connections/add"); ?>' data-useAjax='true' class="form-horizontal">	
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="myModal" style="display: none;">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
              <span class="icon connectionIcon"></span>
            </div>
            <div class="modal-body">		
            	<div class="addWrapper">
	            	<div class="stdpadh stdpadt">
						<span>Business</span>
					</div>
						
					<table class="std">
						<tr>
							<td>
								<input id="my-text-input" type="text" name="connection[Business]" class="selectBusinesses-connections" />
							</td>
						</tr>
					</table>
					<br />		
					<table class="std ">
						<tr class="largeField">
							<td>
								<label for="business_name" class="above">Type of Connection</label>
								<span>
									<?php $js = 'class="connectionSelection"'; ?>
									<?php echo form_dropdown('connection[Type_of_connection]', $type_options, '', $js); ?>
								</span>
								<span id="addTextbox" class="addConnection icon plusIconGrey"></span>
							</td>
							<td class="slide">
								<input class="addConnectionInput" type="text" name="connection[Add_type_of_connection]" placeholder="Add new connection type" />
							</td>
						</tr>
						<tr class="largeField">
							<td>
								<label for="business_name">Link</label>
								<span><input type="text" value="" id="business_name" name="connection[Link]"></span>
							</td>
							<td>
								<label for="business_name">Username 1</label>
								<span><input type="text" value="" id="business_name" name="connection[Username]"></span>
							</td>
						</tr>
						<tr class="largeField">
							<td>
								<label for="address_Address_Line_1">Username 2</label>
								<span><input type="text" value="" id="address_Address_Line_1" name="connection[Username_2]"></span>
							</td>
							<td>
								<label for="address_Address_Line_2">Password</label>
								<span><input type="text" value="" id="address_Address_Line_2" name="connection[Password]"></span>
							</td>
						</tr>
					</table>
				</div>
			</div>
	    <div class="modal-footer">
	    	<div class="resetForm icon resetIcon"></div>
	      <button data-dismiss="modal" type="reset" class="btn">Close</button>
	      <button data-dismiss="modal" type="submit" class="btn btn-primary add">Save Contact</button>
	    </div>
	</div>
</form>
<div class="clear"></div>