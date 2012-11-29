<?php foreach($comms as $comments) { ?>
	<li>
		<strong><?php if($comments['who'] == 'C'){ echo 'You: '; } else { echo $comments['name'] . ': '; } ?> </strong><?php echo $comments['comment']; ?> - <small><?php echo mdate('%d/%m/%Y - %h:%i %a', strtotime($comments['date'])); ?></small>
		<?php $images = explode('|', $comments['files']); ?>
		<?php foreach($images as $img){ 
			$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
			switch($ext){
				case "tif":
				case "gif":
				case "png":
				case "jpg":
					echo '<a target="_blank" href="' . site_url() . 'uploads/concepts/' . $comments['project_id'] . '/uploads/' . $img . '">Image</a>';
					break;
				case "pdf":
				case "doc":
					echo '<a target="_blank" href="' . site_url() . 'uploads/concepts/' . $comments['project_id'] . '/uploads/' . $img . '">File</a>';;
					break;
			}
		}
		?>
	</li>
<?php } ?>						