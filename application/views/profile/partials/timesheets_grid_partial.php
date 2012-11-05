<?php foreach($timesheets as $contact){ ?>
	<tr>
		<td><?php echo $contact['people_id']; ?></td>
		<td><a href="/contacts/details/<?php echo $contact['people_id']; ?>"><?php echo $contact['name']?></a></td>
		<td><?php echo $contact['email']; ?></td>
		<td><?php echo $contact['phone']; ?></td>
		<td><a class="tableRowFive" href="/contacts/disable/<?php echo $contact['people_id']; ?>"><span class="util-button-new first"><span class="disable"></span></span></a></td>
	</tr>
<?php } ?>