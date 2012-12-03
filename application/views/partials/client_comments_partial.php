<?php foreach($comms as $comments) { ?>
	<li>
			<?php 
			if($comments['who'] == 'C' && $this->session->userdata('is_admin') != true){ 
				echo '<span class="black">You: </span>'; 
			} else if($comments['who'] == 'C' && $this->session->userdata('is_admin') == true){ 
				echo '<span class="black">' . $comments['cus_name'] . ': </span>'; 
			} else if($comments['who'] == 'A' && $this->session->userdata('is_admin') == true){
				echo '<span class="orange">You: </span>';
			} else if($comments['who'] == 'A' && $this->session->userdata('is_admin') != true){
				echo '<span class="orange">' . $comments['admin_name'] . '</span>';
			} ?> 
		<?php echo $comments['comment']; ?> - <small><?php echo mdate('%d/%m/%Y - %h:%i %a', strtotime($comments['date'])); ?></small>
		<?php $images = explode('|', $comments['files']); ?>
		<?php foreach($images as $img){ 
			$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
			switch($ext){
				case "tif":
				case "gif":
				case "png":
				case "jpg":
					echo '<a href="' . site_url() . 'client/project/download/' . $comments['project_id'] . '/' . $img . '">Image</a>';
					break;
				case "pdf":
				case "doc":
					echo '<a href="' . site_url() . 'uploads/concepts/' . $comments['project_id'] . '/uploads/' . $img . '">File</a>';;
					break;
			}
		}
		?>
	</li>
<?php } ?>						