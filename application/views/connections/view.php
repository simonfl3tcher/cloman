<form action="" method="post" class="form-horizontal">	
	<input type="hidden" name="connection[ID]" value="<?php echo $connection->getID(); ?>" />
    	<div class="stdpadh stdpadt">
			<span>Business</span>
		</div>
			
		<table class="std">
			<tr>
				<td>
					<input id="my-text-input" type="text" name="connection[Business]" class="" />
				</td>
			</tr>
		</table>
		<br />		
		<table class="std ">
			<tr class="largeField">
				<td>
					<label class="above">Type of Connection</label>
					<span>
						<?php $js = 'class="connectionSelection"'; ?>
						<?php echo form_dropdown('connection[Type_of_connection]', $type_options, $connection->getConnectionOptionsID(), $js); ?>
					</span>
				</td>
			</tr>
			<tr class="largeField">
				<td>
					<label>Link</label>
					<span><input type="text" value="<?php echo $connection->getUrl(); ?>" id="" name="connection[Link]"></span>
				</td>
				<td>
					<label>Username 1</label>
					<span><input type="text" value="<?php echo $connection->getUsername(); ?>" id="" name="connection[Username]"></span>
				</td>
			</tr>
			<tr class="largeField">
				<td>
					<label>Username 2</label>
					<span><input type="text" value="<?php echo $connection->getUsernameTwo(); ?>" id="" name="connection[Username_2]"></span>
				</td>
				<td>
					<label>Password</label>
					<span><input type="text" value="<?php echo $connection->getPassword(); ?>" id="" name="connection[Password]"></span>
				</td>
			</tr>
		</table>
	<input type="submit" class="btn btn-mini btn-success" value="Update Contact" />
</form>

<script>
	var c = window.location.pathname;
	var x = c.substr(c.lastIndexOf('/')+1);
	$.ajax({
		url: '/connections/get_businesses/' + x,
		type: 'GET',
		data: 'json',
		success: function(data){
			$("#my-text-input").tokenInput("/businesses/token", {
				theme: "facebook",
				prePopulate: eval('(' + data + ')'),
				preventDuplicates: true,
				tokenLimit: 1
			});
		},
	});
</script>