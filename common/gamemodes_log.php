<?php include_once "helpers/gamemodes_log_check_user.php"; ?>

<div class="divform">
	<div class="col-md-push-3 col-md-6 col-xs-12" style="text-align:center;">
		<form method="POST">
			<div style="text-align:cetner; position: relative; margin-top:6%; margin-left:10%; margin-right:25%">
				<label class="Plate">
					<label>  Main Score</label>
					<select name="scoreSelect">
			  			<option value="301">301</option>
			  			<option value="501">501</option>
			  			<option value="701">701</option>
			  			<option value="1001">1001</option>
					</select>
				</label>
			</div>
			<div style="text-align:cetner; position: relative; margin-top:6%; margin-left:10%; margin-right:25%">
				<label class="Plate">
					<label>Legs Format</label>
					<select name="legSelect">
			  			<option value="2">2 of 3</option>
			  			<option value="3">3 of 5</option>
			  			<option value="4">4 of 7</option>
			  			<option value="5">5 of 9</option>
					</select>
				</label>
			</div>
			<div style="text-align:cetner; position: relative; margin-top:6%; margin-left:10%; margin-right:25%">
				<label class="Plate">
					<label>Sets Format</label>
					<select name="setSelect">
			  			<option value="2">2 of 3</option>
			  			<option value="3">3 of 5</option>
			  			<option value="4">4 of 7</option>
			  			<option value="5">5 of 9</option>
					</select>
				</label>
			</div>
			<div style="text-align:cetner; margin-top:6%; margin-left:10%; margin-right:25%">
				<button id="submit" name ="submit" class="btn btn-primary red">Start Game</a><br>
			</div>
		</form>
	</div>


	<div class="col-md-pull-6 col-md-3 col-xs-6" style="text-align:center;">
		<div class="score">Player 1 is ready</div>
	</div>

	<div class="col-md-3 col-xs-6" style="text-align:center;">
		<div class="score">Player 2</div>
		<div class="login-form-1">
		<form id="login-form" class="text-left" method="post" >
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username_2" class="sr-only">Username</label>
						<input type="text" class="form-control" id="lg_username_2" name="lg_username_2" placeholder="username">
					</div>
					<div class="form-group">
						<label for="lg_password_2" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password_2" name="lg_password_2" placeholder="password">
					</div>
					<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>

<input type="hidden" value="0" />
