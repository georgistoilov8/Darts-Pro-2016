<?php
  $nameErr = $emailErr = $genderErr = $passErr = $passConfErr = $passNotConfErr = $usernameErr = $agreeErr = "";
  $name = $email = $gender = $passwordConfirm = $password = $username = $agree = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname = "registrations";
    echo "Trying to connect";
    echo "autism";
    $conn = new mysqli($servername, $username1, $password1, $dbname);

    if (!$conn) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    }

    if ($conn->connect_error) {
        echo "DIE";
        die("Connection failed: " . $conn->connect_error);
    }

    if (empty($_POST["reg_fullname"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["reg_fullname"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Name can include only letters and white spaces.";
        $name = "";
      }
    }

    if(empty($_POST["reg_password"])){
      $passErr = "Password is required";
    } else {
      $password = test_input($_POST["reg_password"]);
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

    if(empty($_POST["reg_password_confirm"])){
      $passConfErr = "Confirm Password is required";
    } else {
      $passwordConfirm = test_input($_POST["reg_password_confirm"]);
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

    if(!empty($_POST["reg_password"]) && !empty($_POST["reg_password_confirm"])){
      $p1 = test_input($_POST["reg_password"]);
      $p2 = test_input($_POST["reg_password_confirm"]);
      if(preg_match("/^[a-zA-Z0-9]*$/", $p1) && preg_match("/^[a-zA-Z0-9]*$/", $p2)){
        if($p1 != $p2){
          $passNotConfErr = "Password and Confirmed Password are not same.";
          $password = "";
          $passwordConfirm = "";
        }
      }
    }

    if (empty($_POST["reg_email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["reg_email"]);
      $search_email = mysqli_query($conn, "SELECT email FROM Users WHERE email='".$email."'");
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $match_email  = mysqli_num_rows($search_email);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $email = "";
      }
      if ($match_email > 0){
        $emailErr = "This e-mail is already used. Try with different.";
        $email = "";
      }
    }

    if (empty($_POST["reg_gender"])) {
      $genderErr = "Gender is required";
      $gender = "";
    } else {
      $gender = test_input($_POST["reg_gender"]);
    }

    if (empty($_POST["reg_agree"])) {
      $agreeErr = "You need to agree our terms.";
      $agree = "";
    } else {
      $agree = test_input($_POST["reg_agree"]);
    }

    if (empty($_POST["reg_username"])) {
      $usernameErr = "Username is required";
    } else {
      $username = test_input($_POST["reg_username"]);
      $search_username = mysqli_query($conn, "SELECT username FROM Users WHERE username='".$username."'");
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $match_username  = mysqli_num_rows($search_username);
      if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
        $usernameErr = "Username can include only letters, numbers and underscore";
        $username = "";
      }

      if ($match_username > 0){
        $usernameErr = "This username is already used. Please try with different.";
        $username = "";
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
