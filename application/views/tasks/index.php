<div class="control-group">
	<input type="text" name="search" id="search" data-searchurl="/tasks/search/<?php if(isset($archive)){ echo 'archive'; } ?>" placeholder="Search Tasks"/>
	<a href="/tasks/user_tasks/<?php echo $this->session->userdata('user_id'); ?>"><span style="display:inline-block">My Tasks</span></a>
	<a href="/tasks/archived_tasks"><span style="display:inline-block">Achieved Tasks</span></a>
	<a href="/tasks/user_archived_tasks"><span style="display:inline-block">My Achieved Tasks</span></a>
</div>

<div id="tableContainer">
	<!-- Put the table in here -->
	<table id="searchTable" class="table table-hover <?php if(!isset($archive)){ echo 'taskTableDraggable'; }?>" data-sorturl="/tasks/task_sort/" data-useAjax='true'>
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
						