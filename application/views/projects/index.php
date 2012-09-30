<div class="control-group">
	<input type="text" name="search" id="search" data-searchurl="/projects/search" placeholder="Search projects"/>
</div>

<?php $this->load->partial('projects/partials/grid_partial.php'); ?>
<!-- <div id="tableContainer">

	<table id="searchTable" class="table table-hover" data-useAjax='true'>
		<thead>
			<tr>
				<th><span class="icon hashIcon"></span></th>
				<th><span class="icon projectIcon"></span></th>
				<th><span class="icon emailIcon"></span></th>
				<th><span class="icon phoneIcon"></span></th>
			</tr>
		</thead>
		<tbody>
			<?php $this->load->partial('businesses/partials/table_partial.php'); ?>
		</tbody>
	</table>
</div> -->
<div class="clear"></div>
<br />
<br />
<span class="boxes-add util-button-new first"><span class="project"></span></span>
<?php $this->load->partial('projects/partials/add_project_partial.php');  ?>
<br />