<form action="" method="post" class="form-horizontal">	
	<input type="hidden" name="contact[ID]" value="<?php echo $contact->getID(); ?>" />
	<h3 id="myModalLabel">Add A Contact</h3>
	<table class="std">
		<tbody>
			<tr class="largeField">
				<td>
					<label for="contact_Name_First" class="above">Name</label><br>
					<span><input type="text" value="<?php echo $contact->getName(); ?>" id="contact_Name_First" name="contact[Name]"></span>
				</td>
				<td>
					<label for="contact_Name_Last" class="above">Role</label><br>
					<span><input type="text" value="<?php echo $contact->getRole(); ?>" id="contact_Role" name="contact[Role]"></span>
				</td>
			</tr>
			<tr class="largeField">
				<td>
					<label for="contact_Email" class="above">Email Address</label><br>
					<span><input type="text" id="contact_Email" name="contact[Email]" value="<?php echo $contact->getEmail(); ?>"></span>
				</td>
				<td>
					<label for="contact_Url" class="above">Phone</label><br>
					<span><input type="text" id="contact_Phone" name="contact[Phone]" value="<?php echo $contact->getPhone(); ?>"></span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label for="contact_Url" class="above">Notes</label><br>
					<textarea id="contact_Phone" name="contact[Notes]" rows="4" cols="20"><?php echo $contact->getNotes(); ?></textarea>
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
	<br />
	<input type="submit" class="btn btn-mini btn-success" value="Update Contact" />
</form>