<?php
    session_start();
    if(!isset($_SESSION["username"])){

        ?>
        <script type="text/javascript">
            window.location="/Library/index.html";
        </script>
        <?php
    }
    include "header.php";
    include "connection.php";
?>


        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>

                    
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Request Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">

<table class="table table-bordered">
    
    <tr>
        <td>
        <h5> Enter the Book Name:</h5>
            <input type="text" class="form-control" name="books_name" placeholder="Book Name" required="">
        </td>
    </tr>
    <tr>
        <td>
        <h5> Enter the Edition:</h5>
            <input type="number" class="form-control" name="edition" placeholder="Edition">
        </td>
    </tr>
    <tr>
        <td>
            <input type="submit" value="Request the Book" name="submit1" >
        </td>
    </tr>
</table>

</form>
</div>
<div class="x_title">
<h4>My Requested books</h4>
</div>
<table class="table table-bordered">
    <tr>
    <th>Book Name</th>
    <th>Edition</th>
    <th>Accept Status</th>
    </tr>

    <?php
    $res3=mysqli_query($db,"SELECT  `usn` FROM `student` where username='$_SESSION[username]' ");
    while($row3=mysqli_fetch_array($res3))
    {
        $usn=$row3["usn"];
        $_SESSION['usn']=$usn;
    }
        $res = mysqli_query($db, "SELECT * FROM `request_books` WHERE usn='$_SESSION[usn]' ") or die("Error: " . mysqli_error($db));
        while($row=mysqli_fetch_array($res)){
            
            
            
            echo "<tr>";
            echo "<td>"; echo $row["books_name"]; echo "</td>";
            echo "<td>"; echo $row["edition"]; echo "</td>";
            $status=$row["status"];
            if($status=='no'){
                echo "<td class='bg-warning'>";
            }
            else{
                echo "<td class='bg-info'>";

            }
            
            echo $row["status"]; echo "</td>";
            echo "</tr>";
        }
    ?>
</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php
    if(isset($_POST["submit1"])){
        $usn=$_SESSION['usn'];
        $books_name=$_POST['books_name'];
        $edition=$_POST['edition'];
        mysqli_query($db, "INSERT INTO `request_books` VALUES('','$books_name','$edition','$usn','no')")
    ?>
    <script type="text/javascript">
        alert("Book Requested successfully!");
    </script>
    <?php
        
    
    
    }

?>
<?php


    include "footer.php";
?>