<form action="" method="post">
	<input type="hidden" name="faq[User]" value="<?php echo $faq_information['request_by']; ?>" />
	<table>
		<tr class="largeField">
			<td>
				<label for="business_name">Question</label>
				<span><input type="text" id="reminder_name" name="faq[Question]" value="<?php echo $faq_information['question']; ?>"></span>
			</td>
		</tr>
		<tr>
			<td>
				<label>Answer</label>
				<textarea name="faq[Answer]"><?php echo $faq_information['explanation']; ?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<label>Status</label>
				<select name="faq[Status]">
					<option value="N">Live</option>
					<option value="Y" <?php if($faq_information['disabled'] == 'Y') { echo 'selected="selected"'; } ?> >Disable</option>
				</select>
			</td>
		</tr>
	</table>
	<input type="submit" name="submit" value="<?php if($faq_information['verified'] == 'N') { echo 'Verify'; } else { echo 'Update FAQ'; } ?>" class="btn"/>
</form>