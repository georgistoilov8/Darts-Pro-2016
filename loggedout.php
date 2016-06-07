<?php include_once "common/header.php"; ?>

<?php include_once "common/navbar.php";?>

<?php
	$_SESSION['username'] = "";
	$_SESSION['loggedin'] = false;
	$_SESSION['username_2'] = "";
	$_SESSION['loggedin_2'] = false;
	echo '<label style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%);" class="score">Thank you for using our site.</label>';
  echo '<label style="position: absolute; left: 60%; top: 80%" class="score">Redirecting in 3 seconds...</label>';
  header("refresh:3;url=home.php");
?>
