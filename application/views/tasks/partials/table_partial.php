<?php foreach($task_list as $tasks){ ?>
	<tr id="item_<?php if(isset($tasks['task_id']) && $tasks['task_id'] != null){ echo $tasks['task_id']; } ?>">
		<td><?php if(!isset($archive)){ echo 'drag'; } else { echo $tasks['task_id']; } ?></td>
		<td><a href="/tasks/details/<?php echo $tasks['task_id']; ?>"><?php echo $tasks['name']?></a></td>
		<td class="editable"><?php echo $tasks['status_notes']; ?></td>
		<td><?php echo $tasks['business_name']; ?></td>
		<td><?php echo $tasks['status_id']; ?></td>
		<?php if(!isset($archive)){ ?>
			<td><a class="tableRowFive" href="/tasks/complete/<?php echo $tasks['task_id']; ?>"><span class="util-button-new first"><span class="complete"></span></span></a></td>
		<?php } else { ?>
			<td><span class="icon completeIcon"></span></td>
		<?php } ?>
	</tr>
<?php } ?>
