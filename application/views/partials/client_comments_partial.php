<?php foreach($comms as $comments) { ?>
	<li>
		<strong><?php if($comments['who'] == 'C'){ echo 'You: '; } else { echo $comments['name'] . ': '; } ?> </strong><?php echo $comments['comment']; ?> - <small><?php echo mdate('%d/%m/%Y - %h:%i %a', strtotime($comments['date'])); ?></small>
	</li>
<?php } ?>						