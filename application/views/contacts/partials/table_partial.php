<?php foreach($contact_list as $contact){ ?>
	<tr>
		<td><?php echo $contact['people_id']; ?></td>
		<td><a href="/contacts/details/<?php echo $contact['people_id']; ?>"><?php echo $contact['name']?></a></td>
		<td><?php echo $contact['email']; ?></td>
		<td><?php echo $contact['phone']; ?></td>
		<td><a class="delete" href="/contacts/disable/<?php echo $contact['people_id']; ?>"><button class="btn  btn-mini btn-danger">Disable</button></a></td>
	</tr>
<?php } ?>