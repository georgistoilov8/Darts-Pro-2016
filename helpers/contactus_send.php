<?php
if($name != "" and $email != "" and $message != ""){
  if(isset($_POST["submit_button"])){
    $to = "g.stoilov@mail.bg"; // Send email to our user
    $subject = 'Darts'; // Give the email a subject
    $message_to_send = '
      E-mail: '.$email.'
      Name: '.$name.'
      ------------------------
      '.$message.'
      ------------------------

      ';

    $headers = 'From:dartspro2016@gmail.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message_to_send, $headers); // Send our email
    echo '<div><label class="score">Thank you for contacting us.</label></div>';
  }
}
?>
