<div class="control-group">
	<input type="text" name="search" id="search" data-searchurl="/support_packs/search" placeholder="Search Support Packs"/>
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
			<?php $this->load->partial('support_packs/partials/table_partial.php'); ?>
		</tbody>
	</table>
</div>