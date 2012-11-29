<form action="" method="post" class="form-horizontal">	
	<table>
		<tr class="largeField">
			<td>
				<label for="business_name">Name</label>
				<span><input type="text" value="<?php echo $support_pack->name; ?>" id="reminder_name" name="support[Name]"></span>
			</td>
			<td>
				<label for="business_name">Price</label>
				<div class="input-prepend input-append">
			   		<span class="add-on">&pound;</span><input name="support[Price]" class="span2" id="appendedPrependedInput" size="16" type="text" value="<?php echo $support_pack->price; ?>"><span class="add-on">.00</span>
			    </div>
			</td>
		</tr>
		<tr>
			<td>
				<label for="business_name">Support Time</label>
				<input type="text" class="addTime" placeholder="00:00:00" value="<?php echo secondsToTime($support_pack->time_allowed_pm); ?>" name="support[Time]" />
			</td>
		</tr>
	</table>
	<table>
		<tr class="largeField">
			<td>
				<label for="business_name">Short Description (255 Characters)</label>
				<span><textarea name="support[Description]" style="width: 439px; height: 50px;"><?php echo $support_pack->description ? $support_pack->description : ''; ?></textarea></span>
			</td>
		</tr>
	</table>
	<table>
		<tr class="largeField">
			<td>
				<label for="business_name">Includes</label>
				<span><textarea name="support[Includes]" style="width: 438px; height: 200px;"><?php echo $support_pack->includes ? $support_pack->includes : ''; ?></textarea></span>
			</td>
		</tr>
	</table>
	<table>
		<tr class="largeField">
			<td>
				<label for="business_name">Client Description</label>
				<span><textarea name="support[Client]" style="width: 438px; height: 200px;"><?php echo $support_pack->client_description ? $support_pack->client_description : ''; ?></textarea></span>
			</td>
		</tr>
	</table>
	<br />
	<input type="submit" class="btn btn-mini btn-success" value="Update Support Pack" />
</form>