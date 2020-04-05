<?php
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
        $sql="SELECT username from `student` where email='$_POST[email]' && password='$_POST[password]' ";
        $res=mysqli_query($db,$sql);
        $count=mysqli_num_rows($res);
        $username = $sql;

        
        if($count==0)
        {
          
        ?>
          <script type="text/javascript">
           alert("Email and password doesn't match");
          </script>
        <?php
        }
        else
        {
           


          ?>
            <script type="text/javascript">
            
              window.location="/Test/student/dashboard.php"
            </script>
          <?php

        }

      }

    ?>

</body>
</html>