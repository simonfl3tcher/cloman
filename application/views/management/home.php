<a href="/support_packs">Support Packs</a>
<a href="/management/import">Import</a>
<a href="/management/export">Export</a>
<br /><br />
 <ul class="nav nav-tabs">
    <li class="active"><a href="#taskstatuses" data-toggle="tab">Task Statuses</a></li>
    <li><a href="#comments" data-toggle="tab">Comments</a></li>
    <li><a href="#timetracking" data-toggle="tab">Track Time</a></li>
    </ul>
 
	<div class="tab-content">
		<div class="tab-pane active" id="taskstatuses">
			<form action="/management/update_task_statuses" method="post" class="taskstatuses">
				<div class="inputWrapper">
					<?php foreach($task_statuses as $status){ ?>
						<input type="text" name="<?php echo $status['status_id']; ?>[name]" value="<?php echo $status['name']; ?>" /><span><input type="text" name="<?php echo $status['status_id']; ?>[color]" value="<?php echo $status['color']; ?>" class="hexref"/></span><br />
					<?php } ?>
				</div>
				<input type="submit" value="Update" class="btn" />
				<span class="icon plusIconGrey" data-count="0"></span>
			</form>
		</div>
		<div class="tab-pane" id="comments">

		</div>
		<div class="tab-pane" id="timetracking">
			ewdgrjyk
		</div>
	</div>