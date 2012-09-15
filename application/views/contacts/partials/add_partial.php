<form action="" method="post" id="addContactForm" data-ajaxurl='contacts/add' data-useAjax='true' class="form-horizontal">	
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="myModal" style="display: none;">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
              <h3 id="myModalLabel">Add A Contact</h3>
            </div>
            <div class="modal-body">
					<table class="std">
						<tbody>
							<tr class="largeField">
								<td>
									<label for="contact_Name_First" class="above">Name</label><br>
									<span><input type="text" value="" id="contact_Name_First" name="contact[Name]"></span>
								</td>
								<td>
									<label for="contact_Name_Last" class="above">Role</label><br>
									<span><input type="text" value="" id="contact_Role" name="contact[Role]"></span>
								</td>
							</tr>
							<tr class="largeField">
								<td>
									<label for="contact_Email" class="above">Email Address</label><br>
									<span><input type="text" id="contact_Email" name="contact[Email]"></span>
								</td>
								<td>
									<label for="contact_Url" class="above">Phone</label><br>
									<span><input type="text" id="contact_Phone" name="contact[Phone]"></span>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label for="contact_Url" class="above">Notes</label><br>
									<textarea id="contact_Phone" name="contact[Notes]" rows="4" cols="20"></textarea>
								</td>
							</tr>
						</tbody>
					</table>
					<!-- This needs to be hidden until they say to add a business. -->
					<div class="stdpadh stdpadt">
						<h3>Business</h3>
						<p>Please add the information bellow to asign a business to the person.</p>
					</div>
					
					<table class="std">
						<tbody>
						<tr  class="largeField">
							<td>
								<select class="selectBusiness" name="business[Current]">
								<option value="">- Please select a business -</option>
								<?php foreach($business as $bus){ ?>
									<option value="<?php echo $bus['business_id']; ?>"><?php echo $bus['name']; ?></option>
								<?php } ?>
								</select>
							</td>
							<td>
								<p class="addBusiness">Add a new business</p>
							</td>
						</tr>
					</table>
					<div class="businessForm">
						<table class="std ">
							<tr class="largeField">
								<td><label for="business_name">Business Name</label></td>
								<td><span><input type="text" value="" id="business_name" name="business[Name]"></span></td>
							</tr>
							<tr class="largeField">
								<td><label for="business_name">Email</label></td>
								<td><span><input type="text" value="" id="business_name" name="business[Email]"></span></td>
							</tr>
							<tr class="largeField">
								<td><label for="business_name">Phone</label></td>
								<td><span><input type="text" value="" id="business_name" name="business[Phone]"></span></td>
							</tr>
							<tr class="largeField">
								<td><label for="address_Address_Line_1">Property Name / Number*</label></td>
								<td><span><input type="text" value="" id="address_Address_Line_1" name="address[Address_Line_1]"></span></td>
							</tr>
							<tr class="largeField">
								<td><label for="address_Address_Line_2">Street</label></td>
								<td><span><input type="text" value="" id="address_Address_Line_2" name="address[Address_Line_2]"></span></td>
							</tr>
							<tr class="largeField">
								<td><label for="address_Address_Line_3">Area</label></td>
								<td><span><input type="text" value="" id="address_Address_Line_3" name="address[Address_Line_3]"></span></td>
							</tr>
							<tr class="largeField">
								<td><label for="address_City">Town / City*</label></td>
								<td><span><input type="text" value="" id="address_City" name="address[City]"></span></td>
							</tr>
							<tr>
								<td><label for="address_Postcode">Postcode*</label></td>
								<td><span><input type="text" value="" id="address_Postcode" name="address[Postcode]"></span></td>
							</tr>
						</tbody>
					</table>
				</div>
		</div>
            <div class="modal-footer">
              <button data-dismiss="modal" type="reset" class="btn">Close</button>
              <button data-dismiss="modal" type="submit" class="btn btn-primary">Save Contact</button>
            </div>
          </div>
        </form>