<?php
	$password = $passwordConfirm = "";
	$passErr = $passConfErr = $passNotConfErr = $msg = "";
	$servername = "localhost";
	$username1 = "root";
	$password1 = "";
	$dbname = "registrations";
	$conn = new mysqli($servername, $username1, $password1, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['name']) && !empty($_POST['name'])){
		$email = mysqli_escape_string($conn, $_POST['email']);
		$name = mysqli_escape_string($conn, $_POST['name']);

		$search = mysqli_query($conn, "SELECT email, name, active FROM Users WHERE email='".$email."' AND name='".$name."' AND active='1'") or die(mysql_error());
		$match  = mysqli_num_rows($search);

		if($match > 0){
			if(empty($_POST["pass"])){
		       $passErr = "Password is required";
		     } else {
		       $password = test_input($_POST["pass"]);
		       if(!preg_match("/^[a-zA-Z0-9]*$/", $password)){
		         $passErr = "Password can include only letters and numbers.";
		         $password = "";
		       }
		       if(strlen($password) < 4){
		         $passErr = "Too short password.";
		         $password = "";
		       }else if(strlen($password) > 32){
		         $passErr = "Too long password.";
		         $password = "";
		       }
		     }

		     if(empty($_POST["conf_pass"])){
		       $passConfErr = "Confirm Password is required";
		     } else {
		       $passwordConfirm = test_input($_POST["conf_pass"]);
		       if(!preg_match("/^[a-zA-Z0-9]*$/", $passwordConfirm)){
		         $passErr = "Confirm Password can include only letters and numbers.";
		         $passwordConfirm = "";
		       }
		       if(strlen($passwordConfirm) < 4){
		         $passConfErr = "Too short password.";
		         $passwordConfirm = "";
		       }else if(strlen($passwordConfirm) > 32){
		         $passConfErr = "Too long password.";
		         $passwordConfirm = "";
		       }
		     }

		     if(!empty($_POST["pass"]) && !empty($_POST["conf_pass"])){
		       $p1 = test_input($_POST["pass"]);
		       $p2 = test_input($_POST["conf_pass"]);
		       if(preg_match("/^[a-zA-Z0-9]*$/", $p1) && preg_match("/^[a-zA-Z0-9]*$/", $p2)){
		         if($p1 != $p2){
		           $passNotConfErr = "Password and Confirmed Password are not same.";
		           $password = "";
		           $passwordConfirm = "";
		         }
		       }
		     }

		    if(isset($_POST['submit'])){
		    	if($name != "" and $email != "" and $password != "" and $passwordConfirm != ""){
		    		mysqli_query($conn, "UPDATE Users SET password=md5($password) WHERE email='".$email."' AND email='".$email."' AND name='".$name."'");
		    		echo $msg = 'Successfull change';
		    		$passErr = $passConfErr = $passNotConfErr = "";
		    		$password = $email = $name = $passwordConfirm="";
		    	}
		    }
		}else{
			$msg = 'There\'s no user with this email and this name registrated.';
		}
	}

	function test_input($data) {
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}

?>
