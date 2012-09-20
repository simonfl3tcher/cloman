<div class="control-group">
	<input type="text" name="search" id="search" data-searchurl="/contacts/search" placeholder="Search Contact"/>
</div>

<div id="tableContainer">
	<!-- Put the table in here -->
	<table id="search" class="table table-hover" data-useAjax='true'>
		<thead>
			<tr>
				<th><span class="icon hashIcon"></th>
				<th><span class="icon personIcon"></span></th>
				<th><span class="icon emailIcon"></span></th>
				<th><span class="icon phoneIcon"></span></th>
			</tr>
		</thead>
		<tbody>
			<?php $this->load->partial('contacts/partials/table_partial.php'); ?>
		</tbody>
	</table>
</div>

<br />
<br />
<span class="boxes-add util-button-new first"><span class="addPerson"></span></span>
<?php $this->load->partial('contacts/partials/add_partial.php');  ?>
<br />
<form>
</form>
						