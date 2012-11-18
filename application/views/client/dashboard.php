<h2>Projects</h2>
<ul>
	<?php foreach($projects as $project){ ?>
		<a href="<?php echo site_url('client/projects/view/' . $project['project_id']); ?>"><li><?php echo $project['project_name']; ?></a>
	<?php } ?>
</ul>