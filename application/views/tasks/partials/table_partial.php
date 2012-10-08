<?php foreach($task_list as $tasks){ ?>
	<tr id="item_<?php if(isset($tasks['task_id']) && $tasks['task_id'] != null){ echo $tasks['task_id']; } ?>">
		<td>drag</td>
		<td><a href="/tasks/details/<?php echo $tasks['task_id']; ?>"><?php echo $tasks['name']?></a></td>
		<td><?php echo $tasks['business_name']; ?></td>
		<td><?php echo $tasks['status_id']; ?></td>
		<td><a class="delete" href="/tasks/complete/<?php echo $tasks['task_id']; ?>"><span class="util-button-new first"><span class="complete"></span></span></a></td>
	</tr>
<?php } ?>