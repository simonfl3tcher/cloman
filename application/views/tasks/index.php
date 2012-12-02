<div class="control-group">
	<input type="text" name="search" id="search" data-searchurl="/tasks/search/<?php if(isset($archive)){ echo 'archive'; } ?>" placeholder="Search Tasks"/>
	<a href="<?php echo site_url(); ?>tasks/user_tasks/"><span style="display:inline-block">My Tasks</span></a>
	<a href="<?php echo site_url(); ?>tasks/archived_tasks"><span style="display:inline-block">Archived Tasks</span></a>
	<a href="<?php echo site_url(); ?>tasks/user_archived_tasks"><span style="display:inline-block">My Archived Tasks</span></a>
	<span style="display:inline-block" class="sortList">View my sorted list</span>
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
				<th>Importance</th>
			</tr>
		</thead>
		<tbody>
			<?php $this->load->partial('tasks/partials/table_partial.php'); ?>
		</tbody>
		<?php if(!isset($archive)){ ?>
			<tfoot class="editable-row">
				<form post="POST">
						<tr>
							<td class="non-draggable"></td>
							<td class="editable">Name</td>
							<td class="editable">Status Notes</td>
							<td class="editable business">business name</td>
							<td class="editable status">status id</td>
							<td><button class="btn btn-success btn-mini">Add</button></td>
						</tr>
				</form>
			</tfoot>
		<?php } ?>
	</table>
	<?php if(!isset($archive)){ ?>
		<div class="paginationContainer">
			<div class="one_half" id="loadMore">
				Load More
			</div>

			<div class="one_half last" id="loadAll">
				Load All
			</div>

		</div>
	<?php } ?>
</div>

<br />
<br />
						