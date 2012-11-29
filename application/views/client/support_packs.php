<div class="row">
	
	<div class="span12">
		
		<div id="pricing-header" style="text-align: center">
			<h1>Logic Design Support Packs</h1>
			<p>Logic design provides a number of support packs that will help you along the way with all your online ventures</p>
		</div> <!-- /#pricing-header -->
		
		
		
		<div class="pricing-plans plans-4">

			<?php $counter = 0; foreach($support_packs as $packs){ ?>
				
			<div class="plan-container <?php if($counter == 2){ echo 'best-value'; } ?>">
		        <div class="plan">
			        <div class="plan-header">
		                
			        	<div class="plan-title">
			        		<?php echo $packs['name']; ?>	        		
		        		</div> <!-- /plan-title -->
		                
			            <div class="plan-price">
		                	<span class="note">$</span><?php echo $packs['price']; ?><span class="term">Per Month</span>
						</div> <!-- /plan-price -->
						
			        </div> <!-- /plan-header -->       
			        <?php $options = explode('|', $packs['client_description']); ?>
			        <div class="plan-features">
						<ul>
							<?php foreach($options as $opt){ ?>
								<li><?php echo $opt; ?></li>
							<?php } ?>
						</ul>
					</div> <!-- /plan-features -->
					
					<div class="plan-actions">				
						<a href="javascript:;" class="btn growl-type" data-type="success" data-suportid="<?php echo $packs['support_packs_id']; ?>">Request Callback</a>								
					</div> <!-- /plan-actions -->
		
				</div> <!-- /plan -->
		    </div> <!-- /plan-container -->
		    <?php $counter++; ?>
		    <?php } ?>
		    
		</div>
		
	</div> <!-- /.span12 -->
	
</div> <!-- /.row -->