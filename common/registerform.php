<?php include_once "helpers/registerform_check.php"; ?>

<div class="text-center" style="position: absolute; top: 42%; left: 50%; transform: translateX(-50%) translateY(-50%);">
	<div class="logo">register</div>
	<div class="login-form-1">
		<form id="register-form" class="text-left" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">

					<div class="form-group" style="position: relative">
						<label for="reg_username" class="sr-only" id="reg_username_1">Username</label>
						<input type="text" class="form-control" id="reg_username" name="reg_username" placeholder="username" required="">
            <div style="position: absolute; top: 30px; right: 280px; background-color:rgb(120, 255, 148)" class="btn btn-secondary connected text-center" data-toggle="tooltip" data-placement="left" title="Username can include only letters, symbols and underscores.">
                <strong>i</strong>
            </div>
          </div>

					<div class="form-group" style="position: relative">
						<label for="reg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password" required="">
            <div style="position: absolute; top: 30px; right: 280px; background-color:rgb(120, 255, 148)" class="btn btn-secondary connected text-center" data-toggle="tooltip" data-placement="left" title="Password must have at least 4 symbols and max 32 symbols.">
                <strong>i</strong>
            </div>
					</div>

					<div class="form-group" style="position: relative">
						<label for="reg_password_confirm" class="sr-only">Password Confirm</label>
						<input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="confirm password" required="">
            <div style="position: absolute; top: 35px; right: 280px; background-color:rgb(120, 255, 148); text-color:black" class="btn btn-secondary connected text-center" data-toggle="tooltip" data-placement="left" title="Confirm Password must have at least 4 symbols and max 32 symbols. Also Password and Confirmed Password must be the same.">
                <strong>i</strong>
            </div>
					</div>

					<div class="form-group" style="position: relative">
						<label for="reg_email" class="sr-only">Email</label>
						<input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="email" required="">
            <div style="position: absolute; top: 40px; right: 280px; background-color:rgb(120, 255, 148); text-color:black" class="btn btn-secondary connected text-center" data-toggle="tooltip" data-placement="left" title="Valid e-mail.">
                <strong>i</strong>
            </div>
					</div>

					<div class="form-group" style="position: relative">
						<label for="reg_fullname" class="sr-only">Full Name</label>
						<input type="text" class="form-control" id="reg_fullname" name="reg_fullname" placeholder="full name" required="">
            <div id = "tooltipp"style="position: absolute; top: 40px; right: 280px; background-color:rgb(120, 255, 148); text-color:black" class="btn btn-secondary connected text-center" data-toggle="tooltip" data-placement="left" title="Name can include only letters and white spaces.">
                <strong>i</strong>
            </div>
					</div>

					<div class="form-group login-group-checkbox">
						<input type="radio" class="" name="reg_gender" id="male" value = "male" placeholder="username" required="">
						<label for="male">male</label>

						<input type="radio" class="" name="reg_gender" id="female" value = "female" placeholder="username" required="">
						<label for="female">female</label>
					</div>

					<div class="form-group login-group-checkbox">
						<input type="checkbox" class="" id="reg_agree" name="reg_agree" value = "yes" required="">
						<label for="reg_agree">i agree with <a href="terms.php" class="terms" name="terms">terms</a></label>
					</div>
				</div>
				<button type="submit" class="login-button" id="reg_button" name="reg_button" onclick=""><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<p>already have an account? <a href="login.php" class="terms" id="terms">login here</a></p>
			</div>
      <div style="color:red;font-size:15px"><?php echo $usernameErr;?></div>
      <div style="color:red;font-size:15px"><?php echo $emailErr;?></div>
      <div style="color:red;font-size:15px"><?php echo $nameErr;?></div>
      <div style="color:red;font-size:15px"><?php echo $passErr;?></div>
      <div style="color:red;font-size:15px"><?php echo $passConfErr;?></div>
      <div style="color:red;font-size:15px"><?php echo $passNotConfErr;?></div>
		</form>
	</div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

$("body").click(function() {
    $(".overlay").toggle();
});
</script>

<?php include_once "helpers/registerform_reg_and_send.php"; ?>
