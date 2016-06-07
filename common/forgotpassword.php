<?php include_once "helpers/forgotpassword_check_user.php"; ?>

<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

<form id="msform" method="post" style="position: absolute; top: 37%; left: 50%; transform: translateX(-50%) translateY(-50%);" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<ul id="progressbar">
		<li class="active">Account Setup</li>
		<li>Social Profiles</li>
		<li>Personal Details</li>
	</ul>

	<fieldset>
		<h2 class="fs-title">Forgot Password</h2>
		<h3 class="fs-subtitle">When you fill in your registered email address, you will be instructed on how to reset your password.</h3>
		<input type="text" name="email" id="email" placeholder="Email" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Forgot Password</h2>
		<h3 class="fs-subtitle">When you fill in your registered name, you will be instructed on how to reset your password.</h3>
		<input type="text" name="name" id="name" placeholder="Name" />
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Forgot Passowrd</h2>
		<h3 class="fs-subtitle">Please insert your new password</h3>
		<input type="password" name="pass" id="pass" placeholder="Password" />
		<input type="password" id="conf_pass" name="conf_pass" placeholder="New Password" />
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<button type="submit" name="submit" id="submit" onclick="" class="submit action-button" value="Submit"><i>Submit</i></button>
	</fieldset>

</form>

<div style="margin-top: 400px;text-align: center"></div>
<div style="color:red;font-size:15px; text-align: center;"><?php echo $msg;?></div>
<div style="color:red;font-size:15px; text-align: center;"><?php echo $passErr;?></div>
<div style="color:red;font-size:15px; text-align: center;"><?php echo $passConfErr;?></div>
<div style="color:red;font-size:15px; text-align: center;"><?php echo $passNotConfErr;?></div>

<?php include_once "helpers/forgotpassword_annimation.php"; ?>
