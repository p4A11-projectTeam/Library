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
        $sql="SELECT * from `student` where email='$_POST[email]' && answer='$_POST[answer]' ";
       
        $res=mysqli_query($db,$sql);
        $count=mysqli_num_rows($res);
        $row=mysqli_fetch_array($res);
        
        if($count==0)
        {
          
        ?>
          <script type="text/javascript">
           alert("Email or answer is wrong");
           window.location="/Library/index.html"
          </script>
        <?php
        }
        else
        { //echo $_POST["username"];
          
          //echo $_SESSION["username"];
          ?>
            <script type="text/javascript">
              alert("Your password is <?php echo $row["password"]; ?>. Please login to continue.");
              window.location="/Library/index.html"

            </script>
          <?php

        }

      }

    ?>

</body>
</html>