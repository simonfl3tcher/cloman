<form action="" method="post">
<?php
	$js = 'id="exportDropdown"';
	echo form_dropdown('export', $tables_array, '', $js); 
?><br />
<div class="exportDropbox">
	<div class="checkDeterminator">Uncheck All</div>
	<div class="checkboxArea">

	</div>

</div>
<input type="text" name="delimiter" placeholder="," value="," /><br />
<input type="submit" value="Export" class="btn" />
</form>