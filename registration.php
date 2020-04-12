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
        $sql="SELECT username from `student`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `student`(`first`, `last`, `username`, `email`, `usn`, `contact`, `password`,`status`) VALUES ('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[email]', '$_POST[usn]', '$_POST[contact]', '$_POST[password]','no');");
        ?>
          <script type="text/javascript">

           alert("Registration successful, Please login now.");
           window.location="/Library/index.html";

          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
            </script>
          <?php

        }

      }

    ?>

</body>
</html>