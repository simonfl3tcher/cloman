	<div class="action-bar">
		<button type="button" class="btn nav-tabs put-on-hold <?php if($project_details->on_hold == 'Y') { echo 'active'; }?>" data-toggle="button" data-projectid="<?php echo $project_details->project_id; ?>" value="Y">Hold Project</button>
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
		    	<a href="<?php echo site_url(); ?>users/view/<?php echo $project_details->user_id; ?>"><?php echo $project_details->name; ?></a>
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
					<a href="<?php echo site_url(); ?>users/view/<?php echo $workers['user_id']; ?>"><?php echo $workers['name'] ?></a><br />
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

	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Hold Time
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	 <?php echo $hold_time; ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Task Time
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	 <?php echo $project_time; ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Complete Project
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<input type="checkbox" name="completeTask" class="completeTask" data-url="/projects/complete/<?php echo $project_details->project_id; ?>"  />
		    </div>
		</div>
	</div>

	<ul class="nav nav-tabs">
	    <li class="active"><a href="#comments" data-toggle="tab">Comments</a></li>
	    <li><a href="#tasks" data-toggle="tab">Tasks</a></li>
	    <li><a href="#concepts" data-toggle="tab">Concepts</a></li>
    </ul>

    <div class="tab-content">
    	<div class="tab-pane active" id="comments">
    			<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Comments 
            </div>
        </div>
        <div class="commentsAreaId">
        	<?php $this->load->partial('partials/projects_comments_partial.php'); ?>
        	<div class="clear"></div>
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
		    	 <textarea id="commentArea" data-comm="/projects/add_comment/<?php echo $project_details->project_id; ?>"></textarea>
		    </div>
		</div>
	</div>
    	</div>
    	<div class="tab-pane" id="tasks">
    		<?php if(count($project_tasks)){ 
				echo (MyRenderTree($project_tasks, false));
			?>
			<?php } else { ?>
				There are no tasks against this project.
			<?php } ?>
    	</div>

	    <div class="tab-pane" id="concepts">
	    	<ul>
	    	<?php foreach($concepts as $c){ ?>
	    		<li><?php echo $c['name']; ?></li>
	    	<?php } ?>
	    </ul>
	    	<button class="btn btn-primary" id="concept">Add Concept</button>
	    	<a href="<?php echo site_url('client_portal/login/' . $project_details->project_id); ?>"><button class="btn btn-primary">Client Portal</button></a>
	    </div>
    </div>


