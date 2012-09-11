<p>This is the contact home page check it out y'alll</p>
<input type="text" name="search" id="search" data-searchurl="/contacts/search" />
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone No.</th>
		</tr>
	</thead>	
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
</table>

<br />
<br />
<?php render_partial('add', 'contacts'); ?>
<br />