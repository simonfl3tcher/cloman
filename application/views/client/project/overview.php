<h4><?php echo $project_details->project_name; ?></h4>
<span>Project Started on:- </span><strong><?php echo date('d-M-Y', strtotime($project_details->start_date)); ?></strong><br />

<?php $formattedDate = dateDiff(date('m/d/Y h:i:s a', time()), $project_details->client_deadline); ?>
<span>Deadline:- </span><strong><?php if(substr($formattedDate, 0, 1) == '-'){ echo substr($formattedDate, 1) . ' days overdue'; } else { echo $formattedDate . ' days left'; } ?></strong>