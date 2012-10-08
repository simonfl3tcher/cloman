<form action="" post="post" class="form-horizontal">
	<table>
		<tr class="largeField">
			<td>
				<label for="business_name">Task Name</label>
				<span><input type="text" value="<?php echo $task->getName(); ?>" id="project_name" name="task[Name]"></span>
			</td>
		</tr>
	</table>
	<div class="stdpadh stdpadt">
		<span>Business</span>
	</div>
	<table class="std ">
		<tr class="largeField">
			<td>
				<span>
					<?php $js = 'class="taskBusinessSelector"'; ?>
					<?php echo form_dropdown('task[Business]', $businesses, $task->getBusinessID(), $js); ?>
				</span>
			</td>	
		</tr>
	</table>
	<div class="assigntoproject">
		<p>Assign to project ? </p>
		<p class="content"></p>
	</div>
	<div class="stdpadh stdpadt">
		<span>Assign Task To</span>
	</div>
		
	<table class="std">
		<tr>
			<td>
				<input id="my-text-input" type="text" name="task[Workers]" class="selectWork" />
			</td>
		</tr>
	</table>
	<div class="stdpadh stdpadt">
		<span>Dates</span>
	</div>
		
	<table class="std">
		<tr>
			<td>
				<input type="text" name="task[Startdate]" class="datepicker" value="<?php echo date('d-m-Y', strtotime($task->getStartDate())); ?>" />
			</td>
			<td>
				<input type="text" name="task[internal-end-date]" class="datepicker" value="<?php echo date('d-m-Y', strtotime($task->getInternalDeadline())); ?>" />
			</td>
			<td>
				<input type="text" name="task[external-end-date]" class="datepicker" value="<?php echo date('d-m-Y', strtotime($task->getClientDeadline())); ?>" />
			</td>
		</tr>
	</table>

	<div class="stdpadh stdpadt">
		<span>Task Type</span>
	</div>
	<table class="std ">
		<tr class="largeField">
			<td>
				<span>
					<?php $js = 'class="connectionSelection"'; ?>
					<?php echo form_dropdown('task[Type]', $type_options, $task->getTaskTypeID(), $js); ?>
				</span>
			</td>
		</tr>
	</table>
	<div class="stdpadh stdpadt">
		<span>Task Status</span>
	</div>
	<table class="std ">
		<tr class="largeField">
			<td>
				<span>
					<?php $js = 'class="connectionSelection"'; ?>
					<?php echo form_dropdown('task[Status]', $type_status, $task->getStatusID(), $js); ?>
				</span>
			</td>
		</tr>
	</table>


	<div class="stdpadh stdpadt">
		<span>Task Notes</span>
	</div>
		
	<table class="std">
		<tr>
			<td>
				<textarea name="task[Notes]"><?php echo trim($task->getNotes()); ?></textarea>
			</td>
		</tr>
	</table>
	<br />
	<input type="submit" class="btn btn-mini btn-success" value="Update Task" />
</form>
<script type="text/javascript">
var c = window.location.pathname;
var x = c.substr(c.lastIndexOf('/')+1);
$.ajax({
	url: '/tasks/get_workers/' + x,
	type: 'GET',
	data: 'json',
	success: function(data){
		$("#my-text-input.selectWork").tokenInput("/projects/token_workers", {
			theme: "facebook",
			prePopulate: eval('(' + data + ')'),
			preventDuplicates: true
		});
	},
});
</script>