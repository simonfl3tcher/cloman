<div>
	<strong>Name: </strong><span><?php echo $meeting_info['standard']['name']; ?></span><br />
	<strong>Time: </strong><span><?php echo date('h:i:s', strtotime($meeting_info['standard']['start'])) . ' - ' . date('h:i:s', strtotime($meeting_info['standard']['end'])); ?></span><br />
	<strong>Employees: </strong>
	<span>
	<?php $count = 1; ?>
		<?php foreach($meeting_info['users'] as $user){ ?>
			<?php if($count == count($meeting_info['users'])){
				echo $user['name'];
			} else {
				echo $user['name'] . ', ';
			}
			$count++;
			 ?>
		<?php } ?>
	</span>
	<br />
	<strong>People: </strong>
	<span>
	<?php $count = 1; ?>
		<?php foreach($meeting_info['people'] as $people){ ?>
			<?php if($count == count($meeting_info['people'])){
				echo $people['name'];
			} else {
				echo $people['name'] . ', ';
			}
			$count++;
			 ?>
		<?php } ?>
	</span>
	<br />
	<strong>Notes: </strong><span><?php echo $meeting_info['standard']['notes']; ?></span><br />
</div>