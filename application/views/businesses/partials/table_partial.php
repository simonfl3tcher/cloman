<?php foreach($business_list as $business){ ?>
	<tr>
		<td><?php echo $business['business_id']; ?></td>
		<td><a href="<?php echo site_url(); ?>/businesses/details/<?php echo $business['business_id']; ?>"><?php echo $business['name']?></a></td>
		<td><?php echo $business['email']; ?></td>
		<td><?php echo $business['phone']; ?></td>
		<td><a class="tableRowFive" href="<?php echo site_url(); ?>/businesses/disable/<?php echo $business['business_id']; ?>"><span class="util-button-new first"><span class="disable"></span></span></a></td>
	</tr>
<?php } ?>