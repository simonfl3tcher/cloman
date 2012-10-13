<?php foreach($connection_list as $connections){ ?>
	<tr>
		<td><?php echo $connections['name']; ?></td>
		<td><?php echo $connections['url']?></td>
		<td><?php echo $connections['username']; ?></td>
		<td><?php echo !empty($connections['username_two']) ? $connections['username_two'] : ' - '; ?></td>
		<td><?php echo $connections['password']; ?></td>
		<td><a class="tableRowFive" href="/connections/disable/<?php echo $connections['connection_id']; ?>"><span class="util-button-new first"><span class="disable"></span></span></a></td>
		<td><a href="/connections/view/<?php echo $connections['connection_id']; ?>"><span class="util-button-new first"><span class="edit"></span></span></a></td>
	</tr>
<?php } ?>