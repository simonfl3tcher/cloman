<div>
	<p>This is the projects add page</p>
	<form action="" method="post" id="addContactForm" data-ajaxurl='<?php echo base_url("connections/add"); ?>' data-useAjax='true' class="form-horizontal">	
		<div class="addWrapper">
	    	<div class="stdpadh stdpadt">
				<span>Business</span>
			</div>
			<input id="my-text-input" type="text" name="projects[Business]" class="selectBusinesses-connections" />
			<br />		
			<label for="business_name">Project Name</label>
			<input type="text" name="projects[Name]" placeholder="Project Name" />
			<div class="stdpadh stdpadt">
				<span>Project Manager</span>
			</div>
			<input id="my-text-input" type="text" name="projects[Business]" class="selectBusinesses-connections" />
		</div>
	</form>
</div>
