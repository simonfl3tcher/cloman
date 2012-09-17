<p>This is the contact home page check it out y'alll</p>
<div class="control-group">
	<input type="text" name="search" id="search" data-searchurl="/contacts/search" />
</div>

<div id="tableContainer">
	<!-- Put the table in here -->
	<?php $this->load->partial('contacts/partials/table_partial.php'); ?>
</div>

<br />
<br />
<button class="boxes btn  btn-mini btn-success">Add a contact</button>
<?php $this->load->partial('contacts/partials/add_partial.php');  ?>
<br />