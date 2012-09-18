<p>This is the contact home page check it out y'alll</p>
<div class="control-group">
	<input type="text" name="search" id="search" data-searchurl="/contacts/search" placeholder="Search Contact"/>
</div>

<div id="tableContainer">
	<!-- Put the table in here -->
	<table id="search" class="table table-hover" data-useAjax='true'>
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone No.</th>
			</tr>
		</thead>
		<tbody>
			<?php $this->load->partial('contacts/partials/table_partial.php'); ?>
		</tbody>
	</table>
</div>

<br />
<br />
<button class="boxes btn  btn-mini btn-success">Add a contact</button>
<?php $this->load->partial('contacts/partials/add_partial.php');  ?>
<br />
<form>
</form>
						