<p>Welcome to the login page please login or press the register button</p>
<div style="color:#FF0000;">
	<?php if(isset($error)){
		echo $error;
	} ?>
</div>
<form action="" method="post">
	<label>Email address / username</label>
	<input type="text" name="contact[Email]" data-autohide="true" placeholder="email" />
	<label>Password</label>
	<input type="password" name="password" data-autohide="true" placeholder="password" />
	<input type="submit" value="Sign In" />
</form>

<br />
<div style="margin-bottom:20px;">
	<?php echo anchor('member/register', 'Register', 'class="register"'); ?>
</div>