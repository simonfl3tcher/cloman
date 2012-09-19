	<form action="" method="post" id="addContactForm" data-ajaxurl='contacts/add' data-useAjax='true' class="form-horizontal">	
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="myModal" style="display: none;">
	            <div class="modal-header">
	              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
	              <span class="icon contactIcon"></span>
	            </div>
	            <div class="modal-body">		
	            	<div class="addWrapper">		
						<table class="std">
							<tbody>
								<tr class="largeField">
									<td>
										<label for="contact_Name_First" class="above">Name</label>
										<span><input type="text" value="" id="contact_Name_First" name="contact[Name]"></span>
									</td>
									<td>
										<label for="contact_Name_Last" class="above">Role</label>
										<span><input type="text" value="" id="contact_Role" name="contact[Role]"></span>
									</td>
								</tr>
								<tr class="largeField">
									<td>
										<label for="contact_Email" class="above">Email Address</label>
										<span><input type="text" id="contact_Email" name="contact[Email]"></span>
									</td>
									<td>
										<label for="contact_Url" class="above">Phone</label>
										<span><input type="text" id="contact_Phone" name="contact[Phone]"></span>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<label for="contact_Url" class="above">Notes</label>
										<textarea id="contact_Phone" name="contact[Notes]" rows="4" cols="20"></textarea>
									</td>
								</tr>
							</tbody>
						</table>
						<!-- This needs to be hidden until they say to add a business. -->
						<div class="stdpadh stdpadt">
							<span>Business</span>
						</div>
						
						<table class="std">
							<tr>
								<td><input id="my-text-input" type="text" name="business[Current_2]" class="selectBusiness" /></td>
								<td>
									<div class="addBusiness icon plusIcon"></div>
								</td>
							</tr>
						</table>

						<div class="businessForm">
							<div class="paddingTop paddingBottom">
								<span class="icon busniessIcon"></span>
								<span class="addBusinessTitle"><h6>Add a new business</h6></span>
							</div>
							<table class="std ">
								<tr class="largeField">
									<td>
										<label for="business_name" class="above">Business Name</label>
										<span><input type="text" value="" id="business_name" name="business[Name]"></span>
									</td>
									<td>
										<label for="business_name">Email</label>
										<span><input type="text" value="" id="business_name" name="business[Email]"></span>
									</td>
								</tr>
								<tr class="largeField">
									<td>
										<label for="business_name">Phone</label>
										<span><input type="text" value="" id="business_name" name="business[Phone]"></span>
									</td>
								</tr>
								<tr class="largeField">
									<td>
										<label for="address_Address_Line_1">Property Name / Number*</label>
										<span><input type="text" value="" id="address_Address_Line_1" name="address[Address_Line_1]"></span>
									</td>
									<td>
										<label for="address_Address_Line_2">Street</label>
										<span><input type="text" value="" id="address_Address_Line_2" name="address[Address_Line_2]"></span>
									</td>
								</tr>
								<tr class="largeField">
									<td>
										<label for="address_Address_Line_3">Area</label>
										<span><input type="text" value="" id="address_Address_Line_3" name="address[Address_Line_3]"></span>
									</td>
									<td>
										<label for="address_City">Town / City*</label>
										<span><input type="text" value="" id="address_City" name="address[City]"></span>
									</td>
								</tr>
								<tr>
									<td>
										<label for="address_Postcode">Postcode*</label>
										<span><input type="text" value="" id="address_Postcode" name="address[Postcode]"></span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
			</div>
		</div>
		    <div class="modal-footer">
		    	<div class="resetForm icon resetIcon"></div>
		      <button data-dismiss="modal" type="reset" class="btn">Close</button>
		      <button data-dismiss="modal" type="submit" class="btn btn-primary">Save Contact</button>
		    </div>
  		</div>
	</form>
	<div class="clear"></div>