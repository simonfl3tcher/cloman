<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?> | Reason Marketing</title>
	<script src="<?php echo base_url(); ?>js/jQuery.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/underscore.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/backbone.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jQuery-ui.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/functions.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/tokeninput.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/timer.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/fullcalendar.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/ajax.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/site.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/poup.js"></script>
	<script src="<?php echo base_url(); ?>/bootstrap/js/bootstrap.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/popup.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/token.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/fullcalendar.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/site.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>chat-system/css/chat.css" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap-responsive.css" />
</head>
<body>
	<span class="tasks-add util-button-new first"><span class="task"></span></span>
	<span class="reminder-add util-button-new first"><span class="clock"></span></span>
	<div class="pageWrapper">
		<h1><?php echo $title; ?></h1>
	<!-- <div class="container-hide">Hide Container</div>
	<ul>
			<?php foreach($this->session->userdata('all_users') as $u){ ?>
				<?php if($u['is_logged_in'] == 'Y'){ ?>
					<?php $name = $u['display_name']; ?>
					<a href="javascript:void(0)" onclick="javascript:chatWith('<?php echo $name; ?>')">
						<li><?php echo $u['name'] . '(' . $u['is_logged_in'] . ')'; ?></li>
					</a>
				<?php } ?>
			<?php } ?>
		</ul>
 -->