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
		<form id="advancedSearchForm" data-ajaxurl='<?php echo base_url("connections/advanced_search"); ?>' data-useAjax='true'>
			<div class="advanceBox first">
				<span>Business</span>
				<input id="my-text-input" type="text" name="search[Business]" class="selectBusinesses-connections" />
			</div>
			<div class="advanceBox">
				<span>Type of Connection</span><br />
				<span>
					<?php $js = 'class="connectionSelection"'; ?>
					<?php echo form_dropdown('search[Type_of_connection]', $type_options, '', $js); ?>
				</span>
			</div>
			<div class="advanceBox">
				<span>Containing</span><br />
				<input type="text" name="search[containing]" />
			</div>
			<div class="clear"></div>
			<input id="advancedSearchSubmit" type="submit" class="btn" value="Search" />
		</form>
	<div class="clear"></div>
	</div>
</div>

<div id="tableContainer">
	<!-- Put the table in here -->
	<table id="searchTable" class="table table-hover" data-useAjax='true'>
		<thead>
			<tr>
				<th><span class="icon businessIcon"></span></th>
				<th><span class="icon linkIcon"></span></th>
				<th><span class="icon identificationIcon"></span></th>
				<th><span class="icon identificationIcon"></span></th>
				<th><span class="icon keyIcon"></span></th>
			</tr>
		</thead>
		<tbody>
			<?php $this->load->partial('connections/partials/table_partial.php'); ?>
		</tbody>
	</table>
</div>

<br />
<br />
<span class="boxes-add util-button-new first"><span class="connections"></span></span>
<?php $this->load->partial('connections/partials/add_partial.php');  ?>
<br />