<?php foreach($contact_list as $contact){ ?>
	<tr>
		<td><?php echo $contact['people_id']; ?></td>
		<td><a href="<?php echo site_url(); ?>/contacts/details/<?php echo $contact['people_id']; ?>"><?php echo $contact['name']?></a></td>
		<td><?php echo $contact['email']; ?></td>
		<td><?php echo $contact['phone']; ?></td>
		<td><a class="tableRowFive" href="<?php echo site_url(); ?>/contacts/disable/<?php echo $contact['people_id']; ?>"><span class="util-button-new first"><span class="disable"></span></span></a></td>
	</tr>
<?php } ?>