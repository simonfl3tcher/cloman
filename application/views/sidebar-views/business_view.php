	<div class="action-bar"></div>
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
							<?php echo ucwords($business_details->Address_Line_1); ?><br />
							<?php echo ucwords($business_details->Address_Line_2); ?><br />
							<?php if(!empty($business_details->Address_Line_3)){ echo ucwords($business_details->Address_Line_3) . '<br />'; } ?>
							<?php echo ucwords($business_details->City); ?>, <?php echo ucwords($business_details->Region_Name); ?><br />
							<?php echo strtoupper($business_details->Postcode); ?>
						</address>
				<?php } else {
						echo 'No Address Set';
					} ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="field text box-error-wrapper is-inline-editable">
            <div class="label">
              Support Packs
            </div>
        </div>
        <div data-field-type="text" class="value field-type-text">    
		    <div class="display v2">
		    	<span class="addSupportPack icon plusIconGrey"></span>
		    	<span>
					<?php $js = 'class="addingSupport" data-id="' . $business_details->business_id . '"'; ?>
					<?php echo form_dropdown('business[Support_Pack]', $pack_options, '', $js); ?>
				</span>
		    </div>
		</div>
	</div>