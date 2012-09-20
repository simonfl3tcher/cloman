<div class="content">
	<div class="preview-header">
		<div class="img-actions"><span class="util-button-new first"><span class="closeSlider"></span></span></div>
		<div class="bd"><h1><?php echo $contact_details->name; ?></h1></div>
		<div class="img-ext">	<a href="/contacts/view/<?php echo $contact_details->people_id; ?>"><span class="util-button-new first"><span class="edit"></span></span></a></div>
	</div>

	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Name of Contact
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		      <?php echo $contact_details->name; ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Email
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<a href="mailto:<?php echo $contact_details->email; ?>"><?php echo $contact_details->email; ?></a>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Phone No.
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<?php echo $contact_details->phone; ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Role
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<?php echo $contact_details->role; ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Company
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<?php var_dump($business_details); ?>
		    	<?php foreach($business_details as $bd){ ?>
					<a href="/businesses/view/<?php echo $bd['business_id']; ?>"><?php echo $bd['name'] ?></a>
				<?php } ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Notes
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<?php 
					if(!empty($contact_details->notes)){ 
						echo $contact_details->notes;
					} else {
						echo 'You dont have any custom notes';
					} ?>
		    </div>
		</div>
	</div>
</div>