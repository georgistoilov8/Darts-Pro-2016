<?php include_once "common/header.php"; ?>

<?php 
  if ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) && ($_SESSION['loggedin_2'] == false)) {
	include_once "common/navbar_log.php";
	include_once "common/gamemodes_log.php";
  }else if((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) && (isset($_SESSION['loggedin_2']) && $_SESSION['loggedin_2'] == true)){
	include_once "common/navbar_log.php";
	include_once "common/gamemodes_log_2.php";
  }else {
	include_once "common/navbar.php";
	include_once "common/gamemodes.php";
  } 
?>
