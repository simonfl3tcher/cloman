<div class="row">
			
	<div class="tabbable">
		
		<div class="span3">
			
			<ul class="nav nav-tabs nav-stacked">

				<?php $counter = 1;
				foreach($concepts as $con) { ?>
				<li class="conceptList <?php if($counter == 1) { echo "active"; } ?>" data-concept="<?php echo $con['concept_id']; ?>">
					<a href="#tab<?php echo $counter; ?>" data-toggle="tab">
						<i class="icon-tasks"></i>
						<?php echo $con['name']; ?><?php if($con['commentCount'] != 0){ echo '<span class="comCount"> (' . $con['commentCount'] . ')</span>'; } ?>
						<i class="icon-chevron-right"></i>
					</a>              			              	
				</li>
				<?php $counter++; ?>
				<?php } ?>
			</ul>
						
		</div> <!-- /.span3 -->
	
	
		<div class="span9">
			
			<div class="tab-content">

				<?php $counter = 1;
				foreach($concepts as $con) { ?>
				<div class="tab-pane <?php if($counter == 1) { echo 'active'; } ?> " id="tab<?php echo $counter; ?>">
					<h2><?php echo $con['name']; ?></h2>
					<small>Upload Date: <?php echo date('Y-m-d', strtotime($con['date'])); ?></small>
					<br />
					<p><?php echo $con['notes']; ?></p>
					<div class="gallery-container">
						<?php foreach($con['images'] as $img){ ?>
						<li>
							<a href="<?php echo site_url(); ?>client/project/preview/<?php echo $con['project_id']; ?>/<?php echo $img; ?>/<?php echo $counter; ?>" >
								<img src="<?php echo site_url(); ?>uploads/concepts/<?php echo $con['project_id']; ?>/<?php echo $img; ?>" alt="" />
							</a>
							<a href="<?php echo site_url(); ?>client/project/preview/<?php echo $con['project_id']; ?>/<?php echo $img; ?>/<?php echo $counter; ?>"></a>
						</li>
						<?php } ?>
					</div>

					<div class="commentsArea">
						<ul class="commentsUl">	
							<?php $this->load->partial('partials/client_comments_partial.php', $con); ?>
						</ul>

						<br /><br />
						<form action="/concepts/add_comment" method="post" class="commentForm" data-concept="<?php echo $con['concept_id']; ?>">
							<textarea name="comment"></textarea>
							<input type="submit" name="submit_comment" value="Add Comment" class="btn btn-primary" />
						</form>
					</div>

				</div>
				<?php $counter++; ?>
				<?php } ?>
			
			</div> <!-- /.tab-content -->
			
		</div> <!-- /.span9 -->
		
	</div> <!-- /.tabbable -->
	
</div> <!-- /.row -->