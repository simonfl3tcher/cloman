	<div class="action-bar">
		<?php if($task_details->complete == 'N'){ ?>
			<div class="tasks-add" data-parentTask="<?php echo $task_details->task_id; ?>">SubClass</div>
		<?php } ?>
		<span>Start:- <?php echo date('d-M-Y', strtotime($task_details->start_date)); ?> </span>
		<span>Internal:- <?php echo date('d-M-Y', strtotime($task_details->internal_deadline)); ?></span>
		<span>Deadline:- <?php echo date('d-M-Y', strtotime($task_details->client_deadline)); ?></span>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Task Name
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		      <?php echo $task_details->name; ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Task Created By
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		      <a href="/users/view/<?php echo $task_details->task_created_by; ?>"><?php echo $task_details->created_by; ?></a>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Business
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<a href="<?php echo site_url('businesses/view/' . $task_details->bid); ?>"><?php echo $task_details->business_name; ?></a>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Task Type
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<?php echo $task_details->task_type; ?>
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
		    	<?php foreach($worker_details as $workers){ ?>
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
					if(!empty($task_details->notes)){ 
						echo $task_details->notes;
					} else {
						echo 'You dont have any custom notes';
					} ?>
		    </div>
		</div>
	</div>
	<?php if($task_details->complete == 'N'){ ?>
		<div class="fields">
			<div class="field text box-error-wrapper is-inline-editable">
	            <div class="label">
	              Complete Task
	            </div>
	        </div>
	        <div data-field-type="text" class="value field-type-text">    
			    <div class="display v2">
			    	<input type="checkbox" name="completeTask" class="completeTask" data-url="/tasks/complete/<?php echo $task_details->task_id; ?>"  />
			    </div>
			</div>
		</div>
	<?php } else { ?>
		<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
             	Completion Date
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<?php echo date('d-M-Y', strtotime($task_details->actual_completion_date)); ?> 
		    </div>
		</div>
	</div>
	<div class="fields">
			<div class="field text box-error-wrapper is-inline-editable">
	            <div class="label">
	              Uncomplete Task
	            </div>
	        </div>
	        <div data-field-type="text" class="value field-type-text">    
			    <div class="display v2">
			    	<button name="uncompleteTask" class="uncompleteTask btn btn-mini btn-success" data-url="/tasks/uncomplete/<?php echo $task_details->task_id; ?>">Uncomplete Task</button>
			    </div>
			</div>
		</div>

	<?php } ?>
    <ul class="nav nav-tabs">
    <li class="active"><a href="#home" data-toggle="tab">Subtasks</a></li>
    <li><a href="#profile" data-toggle="tab">Comments</a></li>
    </ul>
 
	<div class="tab-content">
		<div class="tab-pane active" id="home">
			<?php if(count($sub_tasks)){ ?>
				<?php foreach($sub_tasks as $task){ ?>
					<input type="checkbox" <?php if($task_details->complete == 'Y'){ echo ' disabled="disabled"'; } ?> name="completeTask" class="completeTask" data-url="/tasks/complete/<?php echo $task['task_id']; ?>" /><span><?php echo $task['name']; ?></span><br />
				<?php } ?>
			<?php } else { ?>
				There are no sub tasks in this task.
			<?php } ?>

		</div>
		<div class="tab-pane" id="profile">
			<div class="fields">
				<div class="field text box-error-wrapper is-inline-editable">
		            <div class="label">
		              Comments 
		            </div>
		        </div>
		        <div class="commentsAreaId">
		        	<?php $this->load->partial('partials/tasks_comments_partial.php'); ?>
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
				    	 <textarea id="commentArea" data-comm="/tasks/add_comment/<?php echo $task_details->task_id; ?>"></textarea>
				    </div>
				</div>
			</div>
		</div>
	</div>