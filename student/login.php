<?php
  session_start();
  include "connection.php";
  
?>

<!DOCTYPE html>
<html>
<head>

  
</head>
<body>



    <?php

      if(isset($_POST['submit']))
      {
        $count=0;
        $sql="SELECT * from `student` where username='$_POST[username]' && password='$_POST[password]' && status='yes' ";
       
        $res=mysqli_query($db,$sql);
        $count=mysqli_num_rows($res);
        
        
        if($count==0)
        {
          
        ?>
          <script type="text/javascript">
           alert("Email and password doesn't match or your membership has been revoked. Please contact for further details");
           window.location="/Library/feedback.html"
          </script>
        <?php
        }
        else
        { //echo $_POST["username"];
          $_SESSION["username"] = $_POST["username"];
          
          //echo $_SESSION["username"];
          ?>
            <script type="text/javascript">
              
              window.location="/Library/student/dashboard.php"

            </script>
          <?php

        }

      }

    ?>

</body>
</html>