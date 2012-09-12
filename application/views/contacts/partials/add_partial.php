<button class="boxes btn  btn-mini btn-success">Add a contact</button>
<div class="contentSlider sliderContent">  
    <a class="popupContactClose">x</a>
	<div class="slideshow">
		<div class="slidesContainer">
			<form action="" method="post" id="addContactForm" data-ajaxurl='contacts/add' data-useAjax='true' class="form-horizontal">	
			<div class="slide">
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
							</tr>
							<tr class="largeField">
								<td>
									<label for="contact_Url" class="above">Phone (With appropriate spaces)</label><br>
									<span><input type="text" id="contact_Phone" name="contact[Phone]"></span>
								</td>
								<td>
									<label for="contact_Display_Name" class="above">Business</label><br>
									<span><input type="text" value="" id="contact_Business" name="contact[Business]"></span>
								</td>
							</tr>
						</tbody>
					</table>
			</div>
			<div class="slide">
					<!-- This needs to be hidden until they say to add a business. -->
					<div class="stdpadh stdpadt">
						<h3>Business</h3>
						<p>Please add the information bellow to asign a business to the person.</p>
					</div>
					
					<table class="std">
						<tbody>
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
				<div class="stdpad">
					<div class="float-right">
						<span><span class="icon add"></span><input id="accountCreator" type="submit" value="Create Account" class="btn"></span>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<div id="backgroundPopup"></div>