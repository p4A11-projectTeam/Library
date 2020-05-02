<?php
  include "connection.php";
  
?>

<!DOCTYPE html>
<html>
<head>

  
</head>
<body>



    <?php

   
    if(isset($_POST['submittodb'])){
   
   
   mysqli_query($db,"INSERT INTO `feedback`(`name`, `email`, `subject`, `message`) VALUES('$_POST[name]','$_POST[email]','$_POST[subject]','$_POST[message]');");
   
 } 
 
 ?>
 </body>
 </html>