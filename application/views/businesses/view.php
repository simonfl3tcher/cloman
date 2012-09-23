<form action="" method="post" class="form-horizontal">	
	<input type="hidden" name="contact[ID]" value="<?php echo $business->getID(); ?>" />
	<h3 id="myModalLabel">Add A Contact</h3>
	<table class="std ">
		<tbody>
			<tr class="largeField">
				<td>
					<label for="business_name" class="above">Business Name</label>
					<span><input type="text" value="<?php if($business->getName()){ echo $business->getName(); } else { echo ''; } ?>" id="business_name" name="business[Name]"></span>
				</td>
				<td>
					<label for="business_name">Email</label>
					<span><input type="text" value="<?php if($business->getEmail()){ echo $business->getEmail(); } else { echo ''; } ?>" id="business_name" name="business[Email]"></span>
				</td>
			</tr>
			<tr class="largeField">
				<td>
					<label for="business_name">Phone</label>
					<span><input type="text" value="<?php if($business->getPhone()){ echo $business->getPhone(); } else { echo ''; } ?>" id="business_name" name="business[Phone]"></span>
				</td>
			</tr>
			<tr class="largeField">
				<td>
					<label for="address_Address_Line_1">Property Name / Number*</label>
					<span><input type="text" value="<?php if($address->getAddressLine1()){ echo $address->getAddressLine1(); } else { echo ''; } ?>" id="address_Address_Line_1" name="address[Address_Line_1]"></span>
				</td>
				<td>
					<label for="address_Address_Line_2">Address Line 1</label>
					<span><input type="text" value="<?php if($address->getAddressLine2()){ echo $address->getAddressLine2(); } else { echo ''; } ?>" id="address_Address_Line_2" name="address[Address_Line_2]"></span>
				</td>
			</tr>
			<tr class="largeField">
				<td>
					<label for="address_Address_Line_3">Address Line 2</label>
					<span><input type="text" value="<?php if($address->getAddressLine3()){ echo $address->getAddressLine3(); } else { echo ''; } ?>" id="address_Address_Line_3" name="address[Address_Line_3]"></span>
				</td>
				<td>
					<label for="address_City">Town / City*</label>
					<span><input type="text" value="<?php if($address->getCity()){ echo $address->getCity(); } else { echo ''; } ?>" id="address_City" name="address[City]"></span>
				</td>
			</tr>
			<tr>
				<td>
					<label for="address_Address_Line_3">Region</label>
					<span><input type="text" value="<?php if($address->getRegion()){ echo $address->getRegion(); } else { echo ''; } ?>" id="address_Region" name="address[Region]"></span>
				</td>
				<td>
					<label for="address_Postcode">Postcode*</label>
					<span><input type="text" value="<?php if($address->getPostcode()){ echo $address->getPostcode(); } else { echo ''; } ?>" id="address_Postcode" name="address[Postcode]"></span>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="stdpadh stdpadt">
		<h3>Contact</h3>
		<p>Please add the information bellow to asign a person to a business.</p>
	</div>

	<table class="std">
		<tbody>
		<tr  class="largeField">
			<td>
				<input class="my-text-input" type="text" name="contact[Current]" class="selectContact" />
			</td>
		</tr>
	</table>
	<br />
	<input type="submit" class="btn btn-mini btn-success" value="Update Business" />
</form>

<script>
	var c = window.location.pathname;
	var x = c.substr(c.lastIndexOf('/')+1);
	$.ajax({
		url: '/businesses/get_contacts/' + x,
		type: 'GET',
		data: 'json',
		success: function(data){
			$(".my-text-input").tokenInput("/contacts/token", {
				theme: "facebook",
				prePopulate: eval('(' + data + ')'),
				preventDuplicates: true
			});
		},
	});
</script>