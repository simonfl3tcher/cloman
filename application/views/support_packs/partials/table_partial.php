<?php foreach($list_of_businesses as $business){ ?>
	<tr>
		<td><?php echo $business['support_packs_id']; ?></td>
		<td><a href="<?php echo site_url(); ?>/businesses/details/<?php echo $business['business_id']; ?>"><?php echo $business['name']?></a></td>
		<td><?php echo $business['support_name']; ?></td>
		<td><?php echo date('Y-m-d', strtotime($business['renewal_date'])); ?></td>
		<td><a class="tableRowFive" href="/support_packs/disable/<?php echo $business['sptb_id']; ?>"><span class="util-button-new first"><span class="disable"></span></span></a></td>
		<td><a class="doAjax" href="/support_packs/renew/<?php echo $business['sptb_id']; ?>"><span class="renewSupport">Renew</span></a></td>
	</tr>
<?php } ?>