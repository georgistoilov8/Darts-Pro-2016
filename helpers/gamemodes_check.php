<?php
  if (isset($_POST['submit'])) {
      $_SESSION['gameScore'] = $_POST['scoreSelect'];
      $_SESSION['legScore'] = $_POST['legSelect'];
      $_SESSION['setScore'] = $_POST['setSelect'];
      header("refresh:0;url=http://localhost/scoreboard.php", true);
  }
  $servername = "localhost";
	$username1 = "root";
	$password1 = "";
	$dbname = "registrations";
	$newURL = "http://localhost/home.php";
	$conn = new mysqli($servername, $username1, $password1, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$user_name = $user_nameErr = $pass_word = $pass_Err = $msg = "";
	if (!empty($_POST["lg_username"])){
     $user_name = test_input($_POST["lg_username"]);
     if (!preg_match("/^[a-zA-Z0-9_]*$/", $user_name)) {
       $user_nameErr = "Username can include only letters, numbers and underscore! Why you tru to hack us?";
       $user_name = "";
     }
  }

  if(!empty($_POST["lg_password"])){
     $pass_word = test_input($_POST["lg_password"]);
     if(!preg_match("/^[a-zA-Z0-9]*$/", $pass_word)){
       $pass_Err = "Password can include only letters and numbers.";
       $pass_word = "";
     }
  }

  if(isset($_POST['lg_username']) && !empty($_POST['lg_username']) AND isset($_POST['lg_password']) && !empty($_POST['lg_password'])){
		if($user_name != "" && $pass_word != ""){
			$username = mysqli_escape_string($conn, $_POST['lg_username']);
			$password = mysqli_escape_string($conn, md5($_POST['lg_password']));

			$search = mysqli_query($conn, "SELECT username, password, active FROM Users WHERE username='".$username."' AND password='".$password."' AND active='1'") or die(mysql_error());
			$match  = mysqli_num_rows($search);
			if($match > 0){
				echo $msg = 'Ready';
				$_SESSION['loggedin'] = true;
	    	$_SESSION['username'] = $username;
				header('Location: http://localhost/gamemode.php', true);
				die();
			}else{
				echo $msg = 'Login Failed! Please make sure that you enter the correct details and that you have activated your account.';
			}
		}
	}
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
