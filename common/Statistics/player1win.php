<?php 
	$player1win = $_POST['player1Win'];
	$player2lose = $_POST['player2Lose'];
	$player1id = $_POST['player1id'];
	$player2id = $_POST['player2id'];
	
	$servername = "localhost";
	$username1 = "root";
	$password1 = "";
	$dbname = "registrations";
	// Create connection
	$conn = new mysqli($servername, $username1, $password1, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	mysqli_query($conn, "UPDATE Statistics SET wins='$player1win' WHERE PlayerID='$player1id'");
	mysqli_query($conn, "UPDATE Statistics SET losses='$player2lose' WHERE PlayerID='$player2id'");
?>
