<?php include_once "helpers/login_check.php"; ?>

<div class="text-center" style="position: absolute; top: 44%; left: 50%; transform: translateX(-50%) translateY(-50%);">
	<div class="logo">login</div>
	<div class="login-form-1">
		<form id="login-form" class="text-left" method="post" >
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="username">
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="password">
					</div>
					<div class="form-group login-group-checkbox">
						<input type="checkbox" id="lg_remember" name="lg_remember">
						<label for="lg_remember">remember</label>
					</div>
				</div>
				<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<p>forgot your password? <a href="resetpassword.php" class="terms">click here</a></p>
				<p>new user? <a href="register.php" class="terms">create new account</a></p>
			</div>
			<div style="color:red;font-size:15px"><?php echo $user_nameErr;?></div>
		    <div style="color:red;font-size:15px"><?php echo $pass_Err;?></div>
		    <div style="color:red;font-size:15px"><?php echo $msg;?></div>
		</form>
	</div>
</div>
