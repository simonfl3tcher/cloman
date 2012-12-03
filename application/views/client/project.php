<div class="row">
	<strong>You have used <?php echo count($concepts); ?> out of <?php echo $project_details->concept_no; ?> of your concept revisions</strong>
	<?php if(isset($success)){ ?>
	    <div class="alert alert-success">
		    <button type="button" class="close" data-dismiss="alert">×</button>
		    <strong>Success!</strong> <?php echo $success; ?>
    	</div>
	<?php } ?>
	<?php if(isset($error)){ ?>
	    <div class="alert alert-danger">
		    <button type="button" class="close" data-dismiss="alert">×</button>
		    <strong>Warning!</strong> <?php echo $error; ?>
    	</div>
	<?php } ?>
</div>
<div class="row">
				
	<div class="tabbable">
		
		<div class="span3">
			
			<ul class="nav nav-tabs nav-stacked">

				<?php $counter = 1;
				foreach($concepts as $con) { ?>
				<li class="conceptList <?php if($this->session->userdata('is_admin') != true){ echo 'client'; } ?> <?php if($counter == $tab) { echo "active"; } ?>" data-concept="<?php echo $con['concept_id']; ?>">
					<a href="#tab<?php echo $counter; ?>" data-toggle="tab">
						<i class="icon-tasks"></i>
						<?php echo $con['name']; ?><?php if($con['commentCount'] != 0 && $this->session->userdata('is_admin') != true){ echo '<span class="comCount"> (' . $con['commentCount'] . ')</span>'; } ?>
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
				<div class="tab-pane <?php if($tab == $counter) { echo 'active'; } ?> " id="tab<?php echo $counter; ?>">
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
						<form id="form<?php echo $counter; ?>" action="" method="post" class="commentForm" data-concept="<?php echo $con['concept_id']; ?>"  enctype="multipart/form-data">
							<input type="hidden" name="project_id" value="<?php echo $project_details->project_id; ?>" />
							<input type="hidden" name="concept" value="<?php echo $con['concept_id']; ?>" />
							<div class="uploadContainer">
								<label>Upload Files</label>
									<input type="file" id="file" name="userfile" size="20" />
									<span class="inline"><span class="icon plusIconButton addAnotherBox" id="addAnotherConceptImage" data-number="1"></span></span>
									<br />
							</div>
							<br /><br />
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