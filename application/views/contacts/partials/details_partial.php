<h1><?php echo $title; ?></h1>

<h3>
	<?php echo $contact_details->name; ?>
</h3>

<p>
	<?php echo $contact_details->email; ?>
</p>
<p>
	<?php echo $contact_details->phone; ?>
</p>
<h5>
	<?php echo $contact_details->business_name; ?>
</h5>
<h6>
	<?php echo $contact_details->role; ?>
</h6>

<p>
	Notes: <br />
	<?php 
	if(!empty($contact_details->notes)){ 
		echo $contact_details->notes;
	} else {
		echo 'You dont have any custom notes';
	} ?>
</p>

<a href="/contacts/edit/<?php echo $contact_details->people_id; ?>"><span class="icon edit-icon">edit</span></a>