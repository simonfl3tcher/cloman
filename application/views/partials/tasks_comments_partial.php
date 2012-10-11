<div data-field-type="text" class="value field-type-text">    
    <div class="display v2">
    	<?php if(count($comments)){ ?>
	    	<ul class="commContainer" data-comm="/tasks/remove_comment/">
	    		<?php foreach($comments as $comment){ ?>
	    			<li><?php echo $comment['user_id'] . ' said... ' . $comment['comment']; ?>    <?php if($comment['user_id'] == $this->session->userdata('user_id')){ ?><span class="icon cancelIcon removeComment" data-commentId="<?php echo $comment['task_comment_id']; ?>"></span><?php } ?></li>
	    		<?php } ?>
	    	</ul>
    	<?php } else { ?>
    		There are no comments against this task
    	<?php } ?>
    </div>
</div>