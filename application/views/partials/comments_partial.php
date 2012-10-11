<div data-field-type="text" class="value field-type-text">    
    <div class="display v2">
    	<?php if(count($comments)){ ?>
	    	<ul>
	    		<?php foreach($comments as $comment){ ?>
	    			<li><?php echo $comment['comment']; ?> -  <span class="removeComment" data-commentId="<?php echo $comment['project_comment_id']; ?>">R</span></li>
	    		<?php } ?>
	    	</ul>
    	<?php } else { ?>
    		There are no comments against this project
    	<?php } ?>
    </div>
</div>