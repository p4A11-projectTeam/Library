<?php
  include "connection.php";
  
?>

<!DOCTYPE html>
<html>
<head>

  
</head>
<body>



    <?php

   
    if(isset($_POST['submit'])){
    $to = "anusreekmanoj@gmail.com"; // Enter YOUR email here
    $subject = $_POST['subject'];
   $body = "A user has entered feedback on the site!\n";
   $body .= "Their feedback is:\n\n";
   $body .= $_POST['message'];
   $headers="From: lms"
   mail($to, $subject, $body,$headers);
   mysqli_query($db,"INSERT INTO `feedback`(`name`, `email`, `subject`, `message`) VALUES('$_POST[name]','$_POST[email]','$_POST[subject]','$_POST[message]');");
   print("<h2>Thanks for your feedback!</h2>");
 } 
 else {echo "Something went wrong";}
 ?>
 </body>
 </html>

