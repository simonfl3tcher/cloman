	<div class="action-bar">
		<span>Start:- <?php echo date('d-M-Y', strtotime($project_details->start_date)); ?> </span>
		<span>Internal:- <?php echo date('d-M-Y', strtotime($project_details->internal_deadline)); ?></span>
		<span>Deadline:- <?php echo date('d-M-Y', strtotime($project_details->client_deadline)); ?></span>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Project Type
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		      <?php echo $project_details->project_type; ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Project Name
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		      <?php echo $project_details->project_name; ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Project Manager
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<a href="/users/view/<?php echo $project_details->user_id; ?>"><?php echo $project_details->name; ?></a>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Project Workers
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<?php foreach($project_workers as $workers){ ?>
					<a href="/users/view/<?php echo $workers['user_id']; ?>"><?php echo $workers['name'] ?></a><br />
				<?php } ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Notes
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<?php 
					if(!empty($project_details->notes)){ 
						echo $project_details->notes;
					} else {
						echo 'You dont have any custom notes';
					} ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Budget
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	 <?php echo '&pound;' . $project_details->budget; ?>
		    </div>
		</div>
	</div>

	<div class="sidebar-divider"></div>

	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Tasks 
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	 <?php foreach($project_tasks as $tasks){ ?>
		    	 		<span><?php echo $tasks['name']; ?></span><br />
		    	 <?php } ?>
		    </div>
		</div>
	</div>

	<div class="sidebar-divider"></div>

	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Comments 
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	 The comments need to go in here.
		    </div>
		</div>
	</div>

	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Make Comment 
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	 <textarea id="projectCommentArea"></textarea>
		    </div>
		</div>
	</div>