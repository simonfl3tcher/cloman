<?php $date = ''; ?>
<?php foreach($timesheets as $time){ ?>
<?php if($time['CompletionDate'] != $date){ ?>
	<tr class="dateSeperator">
		<td><?php echo $time['CompletionDate']; ?></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
<?php } ?>
	<tr>
		<td><?php echo $time['task_timesheet_id']; ?></td>
		<td><?php echo $time['name']?></td>
		<td><?php echo $time['secToTime']; ?></td>
		<td><a href="/profile/edit_timesheet/<?php echo $time['task_timesheet_id']; ?>"><button class="btn btn-warning btn-mini">Update</button></a></td>
		<td><a class="tableRowFive" href="/profile/remove_users_time/<?php echo $time['task_timesheet_id']; ?>"><button class="btn btn-warning btn-mini">Delete</button></a></td>
	</tr>
<?php $date = $time['CompletionDate']; ?>
<?php } ?>