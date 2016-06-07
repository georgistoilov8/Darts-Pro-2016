<?php
$male = 0;
$female = 0;
if($gender == "male"){
  $male = 1;
}else {
  $female = 1;
}

if(isset($_POST['reg_button'])){
  if($name != "" and $email != "" and $gender != "" and $username != "" and $password != "" and $passwordConfirm != "" and $agree != ""){
    echo "<br>";
    echo "Successfull registration";
    echo "<br>";
    $servername = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname = "registrations";
    $conn = new mysqli($servername, $username1, $password1, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";


    $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
    $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
    mysqli_query($conn, "INSERT INTO Users (username, password, email, name, male, female, hash) VALUES(
    '". mysqli_real_escape_string($conn, $username) ."',
    '". mysqli_real_escape_string($conn, md5($password)) ."',
    '". mysqli_real_escape_string($conn, $email) ."',
    '". mysqli_real_escape_string($conn, $name) ."',
    '". mysqli_real_escape_string($conn, $male) ."',
    '". mysqli_real_escape_string($conn, $female) ."',
    '". mysqli_real_escape_string($conn, $hash) ."') ") or die($conn->connect_error);

    $getID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM Users WHERE username = '".$username."'"));
    $id = $getID['id'];

    mysqli_query($conn, "INSERT INTO Statistics (playerid) VALUES('".$id."')") or die('Connect Error: ' . $conn->connect_error);
    $to      = $email; // Send email to our user
    $subject = 'Signup | Verification'; // Give the email a subject
    $message = '

    Thanks for signing up!
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

    ------------------------
    Username: '.$username.'
    Password: '.$password.'
    ------------------------

    Please click this link or copy it to the URL section of your browser to activate your account:
    http://localhost/verify.php?email=' . $email . '&hash=' . $hash . '

    '; // Our message above including the link

    $headers = 'From:georgistoilov123@gmail.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email

    echo "<br>";
    echo "We send you a verification e-mail";
  }
}
?>
