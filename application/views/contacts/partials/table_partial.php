<table id="search" class="table table-hover" data-useAjax='true'>
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
			<td><a href="/contacts/details/<?php echo $contact['people_id']; ?>"><?php echo $contact['name']?></a></td>
			<td><?php echo $contact['email']; ?></td>
			<td><?php echo $contact['phone']; ?></td>
			<td><a href="/contacts/edit/<?php echo $contact['people_id']; ?>"><button class="btn  btn-mini btn-info">Edit</button></a></td>
			<td><a class="delete" href="/contacts/delete/<?php echo $contact['people_id']; ?>"><button class="btn  btn-mini btn-danger">Delete</button></a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>