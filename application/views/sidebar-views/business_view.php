	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Business Name
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		      <?php echo $business_details->name; ?>
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
		    	<a href="mailto:<?php echo $business_details->email; ?>"><?php echo $business_details->email; ?></a>
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
		    	<?php echo $business_details->phone; ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Contacts
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<?php if(!empty($contact_details)){ ?>
			    	<?php foreach($contact_details as $bd){ ?>
						<a href="/contacts/view/<?php echo $bd['people_id']; ?>"><?php echo $bd['name'] ?></a><br />
					<?php } ?>
				<?php } else { 
					echo 'No Contacts';
				} ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Address
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<?php 
					if($business_details->Address_Line_1 !== null){ ?>
						<address>
							<?php echo $business_details->Address_Line_1; ?><br />
							<?php echo $business_details->Address_Line_2; ?><br />
							<?php echo $business_details->Address_Line_3; ?><br />
							<?php echo $business_details->City; ?><?php echo $business_details->Region_Name; ?><br />
							<?php echo strtoupper($business_details->Postcode); ?>
						</address>
				<?php } else {
						echo 'No Address Set';
					} ?>
		    </div>
		</div>
	</div>