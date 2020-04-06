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
        $sql="SELECT username from `student` where email='$_POST[email]' && password='$_POST[password]' && status='yes' ";
        $res=mysqli_query($db,$sql);
        $count=mysqli_num_rows($res);

        
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

              window.location="/Library/student/dashboard.php"

            </script>
          <?php

        }

      }

    ?>

</body>
</html>