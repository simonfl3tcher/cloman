<?php foreach($connection_list as $connections){ ?>
	<tr>
		<td><?php echo $connections['name']; ?></td>
		<td><?php echo $connections['url']?></td>
		<td><?php echo $connections['username']; ?></td>
		<td><?php echo !empty($connections['username_two']) ? $connections['username_two'] : ' - '; ?></td>
		<td><?php echo $connections['password']; ?></td>
		<td><a class="delete" href="/connections/disable/<?php echo $connections['connection_id']; ?>"><span class="util-button-new first"><span class="disable"></span></span></a></td>
	</tr>
<?php } ?>