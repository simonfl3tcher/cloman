<div class="control-group">
	<input type="text" name="search" id="search" data-searchurl="/businesses/search" placeholder="Search Businesses"/>
</div>

<div id="tableContainer">
	<!-- Put the table in here -->
	<table id="searchTable" class="table table-hover" data-useAjax='true'>
		<thead>
			<tr>
				<th><span class="icon hashIcon"></span></th>
				<th><span class="icon businessIcon"></span></th>
				<th><span class="icon emailIcon"></span></th>
				<th><span class="icon phoneIcon"></span></th>
			</tr>
		</thead>
		<tbody>
			<?php $this->load->partial('businesses/partials/table_partial.php'); ?>
		</tbody>
	</table>
</div>

<br />
<br />
<span class="boxes-add util-button-new first"><span class="business"></span></span>
<?php $this->load->partial('businesses/partials/add_partial.php');  ?>
<br />