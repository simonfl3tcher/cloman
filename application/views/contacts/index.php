<p>This is the contact home page check it out y'alll</p>
<div class="control-group">
	<input type="text" name="search" id="search" data-searchurl="/contacts/search" />
</div>
<table id="search" class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone No.</th>
		</tr>
	</thead>
	<tbody>	
		<?php foreach($contact_list as $contact){ ?>
		<tr>
			<td><?php echo $contact['people_id']; ?></td>
			<td><?php echo $contact['name']?></td>
			<td><?php echo $contact['email']; ?></td>
			<td><?php echo $contact['phone']; ?></td>
			<td><a href="/contacts/edit/<?php echo $contact['people_id']; ?>"><button class="btn  btn-mini btn-info">Edit</button></a></td>
			<td><a class="delete" href="/contacts/delete/<?php echo $contact['people_id']; ?>"><button class="btn  btn-mini btn-danger">Delete</button></a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<p class="closeSide">Close</p>

<br />
<br />
<?php render_partial('add', 'contacts'); ?>
<br />

<p class="open">Open</p>

<div class="sidebarSlider">
	<p>This is the sidebar slider :)</p>
</div>

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
							</tr>
							<tr class="largeField">
								<td>
									<label for="contact_Url" class="above">Phone</label><br>
									<span><input type="text" id="contact_Phone" name="contact[Phone]"></span>
								</td>
								<td>
									<label for="contact_Display_Name" class="above">Business</label><br>
									<span><input type="text" value="" id="contact_Business" name="contact[Business]"></span>
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
            <div class="modal-footer">
              <button data-dismiss="modal" class="btn">Close</button>
              <button data-dismiss="modal" type="submit" class="btn btn-primary">Save Contact</button>
            </div>
          </div>
        </form>
