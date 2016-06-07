<?php include_once "common/header.php"; ?>

<?php
	$_SESSION['username_2'] = "";
	$_SESSION['loggedin_2'] = false;
?>

<?php 
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include_once "common/navbar_log.php";
  } else {
	include_once "common/navbar.php";
  } 
?>

<?php include_once "common/profile.php" ?>

<?php include_once "common/footer.php"; ?>
