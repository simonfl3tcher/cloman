<div class="content">
	<div class="preview-header">
		<div class="img-actions"><span class="icon <?php if(isset($icon)) { echo $icon; } else { echo 'rightarrowIcon'; } ?>"></span></div>
		<div class="bd"><h1><?php echo $bannerTitle; ?></h1></div>
		<div class="img-ext">	<a href="/contacts/view/<?php echo $contact_details->people_id; ?>"><span class="util-button-new first"><span class="edit"></span></span></a></div>
	</div>

	<div class="action-bar">
		<a href="task"><span class="icon taskIcon"></span></a>
	</div>

	<?php $this->load->partial($sidebarUrl); ?>
</div>