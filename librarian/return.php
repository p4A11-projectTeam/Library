<?php
session_start();
if(!isset($_SESSION["librarian"])){

    ?>
    <script type="text/javascript">
        window.location="/Library/index.html";
    </script>
    <?php
}
include "connection.php";
include "header.php";

$id=$_GET["id"];
$a  = date("Y-m-d");

$res=mysqli_query($db,"SELECT * from `issue_books` where `issueid`='$id'");
while($row=mysqli_fetch_array($res)){
    $issue_date=$row["issue_date"];
    $books_name=$row["books_name"];
    $edition=$row["edition"];
}
$return_date=date("Y-m-d");


$rdate=date('Y-m-d', strtotime($issue_date. ' + 15 days')); 

if($rdate < $a)
{
    

    ?>
    <div class="right_col" role="main">
            <div class="">
            <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                        <div class="x_content">
   <a href="fine.php"> <div  class="alert alert-danger col-lg-6 col-lg-push-3">
    <h4 href="fine.php" style="text-align:center">Due date has passed, Pay Fine :(</h4> 
                                                                </div></a>
                                                                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
                                                                
        
   
   
    <?php
}

else{
    mysqli_query($db,"UPDATE `issue_books` SET `return_date`= '$return_date' WHERE `issueid`='$id'");
    $res=mysqli_query($db,"UPDATE `issue_books` SET `return_status`= 'yes' WHERE `issueid`='$id'");
    
    
mysqli_query($db,"UPDATE `catalog` SET `availability`=`availability`+1 WHERE `name`='$books_name' and `edition`='$edition'");

    ?>
   
    <script type="text/javascript">
                                                              alert("Book returned successfully!");
                                                        window.location="return_books.php";
                                                        </script>
   <?php
}
include "footer.php";
?>