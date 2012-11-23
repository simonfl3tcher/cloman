<div class="control-group">
	<input type="text" name="search" id="searchGrid" data-searchurl="/projects/search" placeholder="Search projects"/>
	<a href="<?php echo site_url('projects/'); ?>"><span id="advancedSearch" class="util-button-new first"><span class="atoz"></span></span></a>
	<a href="<?php echo site_url('projects/'); ?>"><span id="advancedSearch" class="util-button-new first"><span class="star"></span></span></a>
	<a href="<?php echo site_url('projects/'); ?>"><span id="advancedSearch" class="util-button-new first"><span class="calander"></span></span></a>
</div>
</div>
<div id="gridContainer">
	<?php $this->load->partial('projects/partials/grid_partial.php'); ?>
</div>
<div class="clear"></div>
<br />
<br />
<span class="boxes-add util-button-new first"><span class="project"></span></span>
<?php $this->load->partial('projects/partials/add_project_partial.php');  ?>
<br />

<?php $this->load->partial('templates/concepts_modal.php'); ?>