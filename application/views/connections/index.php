<div class="control-group">
	<input type="text" name="search" id="search" data-searchurl="/connections/search" placeholder="Search Connections"/>
	<span id="advancedSearch" class="util-button-new first"><span class="filter"></span></span>
</div>
<div class="advancedSearchBox">
	<div class="header">
		<span class="icon"></span>
		<span>Advanced Search</span>
	</div>
	<div class="content">
		This is the advanced sarch box.
	<div class="clear"></div>
	</div>
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
<span class="boxes-add util-button-new first"><span class="connections"></span></span>
<?php $this->load->partial('connections/partials/add_partial.php');  ?>
<br />