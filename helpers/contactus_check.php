<?php
$nameErr = $emailErr = $messageErr="";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["user_fullname"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["user_fullname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Name can include only letters and white spaces.";
      $name = "";
    }
  }

  if (empty($_POST["user_email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["user_email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email = "";
    }
  }
  if (empty($_POST["message"])) {
    $messageErr = "You need to add your message";
  } else {
    $message = test_input($_POST["message"]);
  }

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
