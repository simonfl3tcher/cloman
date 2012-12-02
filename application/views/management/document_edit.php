<form action="" method="post" enctype="multipart/form-data">
	<?php if(isset($document_info)) { ?><img alt="" src="<?php echo site_url('uploads/documents/images/' . $document_info['image']); ?>" /><?php } ?>
	<table>
		<tr class="largeField">
			<td>
				<label for="business_name">title</label>
				<span><input type="text" id="reminder_name" name="document[Title]" value="<?php if(isset($document_info)) { echo $document_info['title']; } ?>"></span>
			</td>
		</tr>
		<tr>
			<td>
				<label>Description</label>
				<textarea name="document[Description]"><?php if(isset($document_info)) { echo $document_info['description']; } ?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<label>Status</label>
				<select name="document[Status]">
					<option value="Y">Live</option>
					<option value="N" <?php if(isset($document_info)) { if($document_info['is_live'] == 'N') { echo 'selected="selected"'; } } ?> >Disable</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<label>Image</label>
				<input type="file" name="image" size="20" />
			</td>
		</tr>
		<tr>
			<td>
				<label>File</label>
				<input type="file" name="document" size="20" /> <?php if(isset($document_info)) { ?><span>Current File:-  <?php echo $document_info['file_name']; ?></span> <?php } ?>
			</td>
		</tr>
	</table>
	<?php if(isset($document_info)) { ?>
		<input type="submit" name="submit" value="Update Document" class="btn"/>
	<?php } else { ?>
		<input type="submit" name="submit" value="Add Document" class="btn"/>
	<?php } ?>
</form>

