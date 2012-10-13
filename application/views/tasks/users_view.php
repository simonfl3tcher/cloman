<a href="/tasks/user_tasks/"><span style="display:inline-block">My Tasks</span></a>
<a href="/tasks/archived_tasks"><span style="display:inline-block">Archived Tasks</span></a>
<a href="/tasks/user_archived_tasks"><span style="display:inline-block">My Achieved Tasks</span></a>
<div id="tableContainer">
	<!-- Put the table in here -->
	<table id="searchTable" class="table table-hover taskTableDraggable" data-useAjax='true' data-sorturl="/tasks/users_task_sort/">
		<thead>
			<tr>
				<th><span class="icon hashIcon"></span></th>
				<th><span class="icon personIcon"></span></th>
				<th><span class="icon emailIcon"></span></th>
				<th><span class="icon phoneIcon"></span></th>
			</tr>
		</thead>
		<tbody>
			<?php $this->load->partial('tasks/partials/table_partial.php'); ?>
		</tbody>
	</table>
</div>

<br />
<br />
						