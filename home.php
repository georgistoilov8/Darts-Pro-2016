<?php include_once "common/header.php"; ?>
<?php 
	$_SESSION['username_2'] = "";
	$_SESSION['loggedin_2'] = false;
?>
<div id="main">
    <div class="divform" style="text-align: center">
	   	<form method="get" action="gamemode.php">
   	 		<!--<button type="submit" class="btn btn-primary btn-lg" style="margin-bottom: 5px; width: 200px;">New Game</button><br>-->
			<button class="push_button green">New Game</a><br>
		</form>
		<form method="get" action="">
   	 		<!--<button type="submit" class="btn btn-primary btn-lg" style="margin-bottom: 5px; width: 200px;">New Tournament</button><br>-->
			<button class="push_button blue">New Tournament</a><br>
		</form>
		<form method="get" action="">
   	 		<!--<button type="submit" class="btn btn-primary btn-lg" style="margin-bottom: 5px; width: 200px;">Leaderboard</button><br>-->
			<button class="push_button red">Leaderboard</a><br>
		</form>
	</div>
</div>

<?php 
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include_once "common/navbar_log.php";
  } else {
	include_once "common/navbar.php";
  } 
?>

<?php include_once "common/footer.php"; ?>
