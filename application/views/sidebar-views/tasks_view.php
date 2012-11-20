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
		      <a href="<?php echo site_url(); ?>users/view/<?php echo $task_details->task_created_by; ?>"><?php echo $task_details->created_by; ?></a>
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
    <?php if($task_details->complete == 'N'){ ?>
	    <li class="active"><a href="#subtasks" data-toggle="tab">Subtasks</a></li>
    <?php } ?>
    <li  <?php if($task_details->complete == 'Y'){ echo 'class="active"'; } ?>><a href="#comments" data-toggle="tab">Comments</a></li>
    <li><a href="#timetracking" data-toggle="tab">Track Time</a></li>
    </ul>
 
	<div class="tab-content">
	    <?php if($task_details->complete == 'N'){ ?>
		<div class="tab-pane active" id="subtasks">
			<?php if(count($sub_tasks)){ 
				echo (MyRenderTree($sub_tasks));
			?>
			<?php } else { ?>
				There are no sub tasks in this task.
			<?php } ?>

		</div>
		<?php } ?>
		<div class="tab-pane <?php if($task_details->complete == 'Y'){ echo 'active'; } ?>" id="comments">
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
		<div class="tab-pane" id="timetracking">
			<div class="time_tracker_partial_wrapper">
				<?php $this->load->partial('tasks/partials/task_time_partial.php'); ?>
			</div>
            <?php if($task_details->complete == 'N'){ ?>
			<div class="fields">
				<div class="field text box-error-wrapper is-inline-editable">
		            <div class="label">
		             Track Time
		            </div>
		        </div>
		        <div data-field-type="text" class="value field-type-text">    
				    <div class="display v2">
				    	 <div class="example">
						    <div class="time-counter" data-count="<?php if(!empty($get_current_pause_time)){ echo $get_current_pause_time['task_total_time']; } else { echo 0; } ?>">

						    	<?php if(!empty($get_current_pause_time)){ 
						    		echo (secondsToTime($get_current_pause_time['task_total_time']));
						    	} else {
						    		echo '00:00:00';
						    	} ?>
						    </div>
						</div>
				    </div>
				</div>
			</div>
			<?php } ?>
		    <?php if($task_details->complete == 'N'){ ?>
			<div class="fields">
				<div class="field text box-error-wrapper is-inline-editable">
		            <div class="label">
		            
		            </div>
		        </div>
		        <div data-field-type="text" class="value field-type-text">    
				    <div class="display v2">
				    	 <div class="example" data-taskid="<?php echo $task_details->task_id; ?>">
						    <button class="btn time-tracker start" type="button">Track Time</button>
						    <button class="btn time-tracker-complete" type="button">Complete</button>
						</div>
				    </div>
				</div>
			</div>
			<?php } ?>
			<div class="fields">
				<div class="field text box-error-wrapper is-inline-editable">
		            <div class="label">
		            	Add Time (Manually)
		            </div>
		        </div>
		        <div data-field-type="text" class="value field-type-text">    
				    <div class="display v2">
				    	 <div class="example" data-taskid="<?php echo $task_details->task_id; ?>">
						   	<input type="text" class="addTime" data-addtime="/tasks/add_standard_task_time/<?php echo $task_details->task_id; ?>" placeholder="00:00:00" value="00:00:00" />
						</div>
				    </div>
				</div>
			</div>
		</div>
	</div>