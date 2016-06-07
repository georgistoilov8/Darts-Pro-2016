<?php include_once "common/header.php"; ?>

<?php include_once "common/navbar.php"; ?>
<div id="main">
  <!-- start PHP code -->
  <?php
          $servername = "localhost";
          $username1 = "root";
          $password1 = "";
          $dbname = "registrations";
          // Create connection
          $conn = new mysqli($servername, $username1, $password1, $dbname);
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          mysqli_select_db($conn, "registrations"); // Select registration database.
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
            // Verify data
            $email = mysqli_escape_string($conn, $_GET['email']); // Set email variable
            $hash = mysqli_escape_string($conn, $_GET['hash']); // Set hash variable

            $search = mysqli_query($conn, "SELECT email, hash, active FROM Users WHERE email='".$email."' AND hash='".$hash."' AND active='0'");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $match  = mysqli_num_rows($search);
            if($match > 0){
                // We have a match, activate the account
                mysqli_query($conn, "UPDATE Users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                //echo '<div class="statusmsg"></div>';
                echo '<label style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%);" class="score">Your account has been activated, Thank you for registration.</label>';
                echo '<label style="position: absolute; left: 60%; top: 80%" class="score">Redirecting in 3 seconds...</label>';
                header( "refresh:5;url=login.php" );
                //include_once "common/login.php";
            }else{
                // No match -> invalid url or account has already been activated.
                echo '<div class="statusmsg"></div>';
                echo '<label style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%);" class="score">The url is either invalid or you already have activated your account.</label>';
            }

          }else{
          // Invalid approach
          echo '<div class="statusmsg"></div>';
          echo '<label style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%);" class="score">Invalid approach, please use the link that has been send to your email.</label>';
          }

    ?>
          <!-- stop PHP Code -->
</div>

<?php include_once "common/sidebar.php"; ?>

<?php //include_once "common/footer.php"; ?>
