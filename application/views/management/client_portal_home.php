 <ul class="nav nav-tabs">
    <li class="active"><a href="#faqs" data-toggle="tab">FAQs</a></li>
    <li><a href="#documents" data-toggle="tab">Documents</a></li>
    <li><a href="#clients" data-toggle="tab">Cleint Access</a></li>
    </ul>
 
	<div class="tab-content">
		<div class="tab-pane active" id="faqs">
			<table id="searchTable" class="table table-hover">
				<thead>
					<tr>
						<th><span class="icon hashIcon"></span></th>
						<th>question</span></th>
						<th>status</span></th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($all_faqs as $faqs){ ?>
						<tr>
							<td><?php echo $faqs['faq_id']; ?></td>
							<td><?php echo $faqs['question']; ?></td>
							<td><?php if($faqs['verified'] == 'Y' && $faqs['disabled'] == 'Y'){ echo 'Disabled'; } else if($faqs['verified'] == 'Y'){ echo 'Live'; } else { echo 'Awaiting Verification'; } ?></td>
							<td><a href="<?php echo site_url('client_portal/faq/' . $faqs['faq_id']); ?>">Edit</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="tab-pane" id="documents">
			<table id="searchTable" class="table table-hover">
				<thead>
					<tr>
						<th><span class="icon hashIcon"></span></th>
						<th>Title</span></th>
						<th>Status</span></th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($all_documents as $doc){ ?>
						<tr>
							<td><?php echo $doc['document_id']; ?></td>
							<td><?php echo $doc['title']; ?></td>
							<td><?php if($doc['is_live'] == 'Y'){ echo 'Live'; } else { echo 'Disabled'; } ?></td>
							<td><a href="<?php echo site_url('client_portal/document/' . $doc['document_id']); ?>">Edit</a></td>
					<?php } ?>
				</tbody>
			</table>
			<a href="<?php echo site_url('client_portal/document'); ?>"><button class="btn btn-primary">Add new document</button></a>
		</div>

		<div class="tab-pane" id="clients">
			<table id="searchTable" class="table table-hover">
				<thead>
					<tr>
						<th><span class="icon hashIcon"></span></th>
						<th>Title</span></th>
						<th>Business</span></th>
						<th>Status</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($people as $peeps){ ?>
						<tr>
							<td><?php echo $peeps['people_id']; ?></td>
							<td><?php echo $peeps['name']; ?></td>
							<td><?php echo $peeps['business_name']; ?></td>
							<td><?php if($peeps['has_login_access'] == 'Y'){ echo 'Active'; } else { echo 'disabled'; } ?></td>
							<td><a class="tableRowFive" href="<?php echo site_url(); ?>client_portal/disable_client/<?php echo $peeps['people_id']; ?>"><span class="util-button-new first"><span class="disable"></span></span></a></td>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>