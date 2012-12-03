<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<title>Dashboard Admin</title>
	
	<meta charset="utf-8">
	
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	
	<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,800"> -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/font-awesome.css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/bootstrap-responsive.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/ui-lightness/jquery-ui-1.8.21.custom.css">	
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/application-black-orange.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/pages/dashboard.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/site.css">
	<link href="<?php echo base_url(); ?>client_assets/js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>client_assets/js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet">	

	<script src="<?php echo base_url(); ?>client_assets/js/libs/modernizr-2.5.3.min.js"></script>

</head>

<body>
	
<div id="wrapper">
	
<div id="topbar">
	
	<div class="container">
		
		<a href="javascript:;" id="menu-trigger" class="dropdown-toggle" data-toggle="dropdown" data-target="#">
			<i class="icon-cog"></i>
		</a>
	
		<div id="top-nav">
			
			<ul class="pull-right">
				<li class="grey"><i class="icon-user"></i> Logged in as <?php if($this->session->userdata('is_admin')){ echo 'Admin'; }else{ echo $user_data['name']; } ?></li>
				<?php if($comment_full_count['c'] > 0 && $this->session->userdata('is_admin') != true){ ?><li class="grey"><span class="badge badge-primary"><?php echo $comment_full_count['c']; ?></span> New Comments</li><?php } ?>
				<li><a href="<?php echo site_url('client/logout'); ?>">Logout</a></li>
			</ul>
			
		</div> <!-- /#top-nav -->
		
	</div> <!-- /.container -->
	
</div> <!-- /#topbar -->


	
	
<div id="header">
	
	<div class="container">
		
		<a href="<?php echo site_url('client'); ?>" class="brand">Dashboard Admin</a>
		
		<a href="javascript:;" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        	<i class="icon-reorder"></i>
      	</a>
	
		<div class="nav-collapse">
			<ul id="main-nav" class="nav pull-right">
				<li class="nav-icon active">
					<a href="<?php echo site_url('client'); ?>">
						<i class="icon-home"></i>
						<span>Home</span>        					
					</a>
				</li>
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-copy"></i>
						<span>Projects</span> 
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
						<?php foreach($projects as $project){ ?>
							<li><a href="<?php echo site_url('client/project/' . $project['project_id']); ?>"><?php echo $project['project_name']; ?><?php if($project['comment_count'] > 0 && $this->session->userdata('is_admin') != true) { echo ' <span class="badge badge-primary">' . $project['comment_count'] . '</span>'; } ?></a></li>
						<?php } ?>
					</ul>    				
				</li>
		
				<!-- <li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-th"></i>
						<span>Tasks</span> 
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
						<li><a href="#">Current Tasks</a></li>
						<li><a href="#">Request Task</a></li>
					</ul>    				
				</li> -->
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-external-link"></i>
						<span>Extras</span> 
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
					<!-- Bellow is only if they are on a support pack -->							
						<!-- <li><a href="#">Request Support Ticket</a></li> -->
						<li><a href="<?php echo site_url('client/faq'); ?>">FAQ</a></li>
						<li><a href="<?php echo site_url('client/support'); ?>">Support Packs</a></li>
						<li><a href="<?php echo site_url('client/documents'); ?>">Documents</a></li>
						<li><a href="<?php echo site_url('client/team'); ?>">Meet the team</a></li>
						<!-- <li><a target="_blank" href="http://www.logicdesign.co.uk">Plugins</a></li> -->
					</ul>    				
				</li>
			</ul>
			
		</div> <!-- /.nav-collapse -->

	</div> <!-- /.container -->
	
</div> <!-- /#header -->




<div id="masthead">
	
	<div class="container">
		
		<div class="masthead-pad">
			
			<div class="masthead-text">
				<?php if($this->session->userdata('is_admin')){ ?>
					<h2>Hello Admin</h2>
				<?php } else { ?>
					<h2>Hello <?php echo $user_data['name']; ?></h2>
					<?php if($comment_full_count['c'] > 0) { ?>
						<p>You are currently have <?php echo $comment_full_count['c']; ?> comments against your concepts.</p>
					<?php } else { ?>
						<p>You don't have any comments against your concepts</p>
					<?php } ?>
				<?php } ?>
			</div> <!-- /.masthead-text -->
			
		</div>
		
	</div> <!-- /.container -->	
	
</div> <!-- /#masthead -->




<div id="content">

	<div class="container">