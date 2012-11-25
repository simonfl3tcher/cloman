<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<title>Dashboard Admin</title>
	
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
	<link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/font-awesome.css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/bootstrap-responsive.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/ui-lightness/jquery-ui-1.8.21.custom.css">	
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>client_assets/css/application.css">

	<script src="<?php echo base_url(); ?>client_assets/js/libs/modernizr-2.5.3.min.js"></script>

</head>

<body class="login">



<div class="account-container login stacked">
	
	<div class="content clearfix">
		
		<form action="" method="post">
		
			<h1>Logic Design</h1>		
			
			<div class="login-fields">
				
				<p>Sign in using your registered account: <br />
				<small style="color:#FF0000;">
					<?php if(isset($error)){
						echo $error;
					} ?>
				</small></p>
				<div class="field">
					<label for="username">Username:</label>
					<input type="text" id="username" name="email" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>
									
				<button class="button btn btn-primary btn-large">Sign In</button>
				
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->



<script src="<?php echo base_url(); ?>client_assets/js/libs/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>client_assets/js/libs/jquery-ui-1.8.21.custom.min.js"></script>
<script src="<?php echo base_url(); ?>client_assets/js/libs/jquery.ui.touch-punch.min.js"></script>

<script src="<?php echo base_url(); ?>client_assets/js/libs/bootstrap/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>client_assets/js/signin.js"></script>

</body>
</html>
