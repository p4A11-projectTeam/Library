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
        $sql="SELECT username from `admin` where username='$_POST[username]' && password='$_POST[password]' ";
        $res=mysqli_query($db,$sql);
        $count=mysqli_num_rows($res);

        
        if($count==0)
        {
          
        ?>
          <script type="text/javascript">
          window.location="/Library/index.html";
           alert("Username and password doesn't match");
          </script>
        <?php
        }
        else
        {
          $_SESSION["librarian"]=$_POST["username"];

          ?>
            <script type="text/javascript">
              window.location="/Library/librarian/dashboard.php";
            </script>
          <?php

        }

      }

    ?>

</body>
</html>