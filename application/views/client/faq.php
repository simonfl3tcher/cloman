<?php if(isset($success)){ ?>
	<div class="row">
	    <div class="alert alert-success">
		    <button type="button" class="close" data-dismiss="alert">×</button>
		    <strong>Success!</strong> <?php echo $success; ?>
    	</div>
    </div>
<?php } ?>
<?php if(isset($error)){ ?>
	<div class="row">
	    <div class="alert alert-danger">
		    <button type="button" class="close" data-dismiss="alert">×</button>
		    <strong>Error!</strong> <?php echo $error; ?>
    	</div>
    </div>
<?php } ?>
<div class="row">
			
			<div class="span8">
				
						
				<ol class="faqList">
					<?php foreach($faqs as $questions){ ?>
						<li>
								<h4><?php echo $questions['question']; ?></h4>
								<p><?php echo $questions['explanation']; ?></p>	
								
						</li>
					<?php } ?>
				</ol>
				
			</div> <!-- /.span8 -->
			
			
			<div class="span4">
					
				<section id="modals">
					<a href="#myModal" data-toggle="modal" class="btn btn-large btn-primary btn-block btn-big-block">Ask A Question</a>	
				</section>

				<div class="well">
					
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>						
					
					
					<p>Cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>						
				</div> <!-- /.well -->
						
				
			</div> <!-- /.span4 -->
			
		</div> <!-- /.row -->

		<div class="modal fade hide" id="myModal">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Ask A Question</h3>
				</div>
				<form action="" method="post" class="questionModalForm">
				<div class="modal-body">
					<input type="text" name="question" placeholder="Question" />
				</div>
				<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Ask Question" />
				</form>
				</div>
		</div>

