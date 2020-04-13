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
$a  = date("d/m/Y");

$res=mysqli_query($db,"SELECT * from `issue_books` where `issueid`='$id'");
while($row=mysqli_fetch_array($res)){
    $return_date=$row["return_date"];
    $books_name=$row["books_name"];
    $edition=$row["edition"];
}
if($return_date > $a)
{
    ?>
    <div class="right_col" role="main">
            <div class="">
            <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                        <div class="x_content">
    <div class="alert alert-danger col-lg-6 col-lg-push-3">
    <strong style="...">Due date has passed,Pay Fine :(</strong> 
                                                                </div>
                                                                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
                                                                

    <?php
}

else{
    $res=mysqli_query($db,"UPDATE `issue_books` SET `return_status`= 'yes' WHERE `issueid`='$id'");
    
    
mysqli_query($db,"UPDATE `books` SET `availability`=`availability`+1 WHERE `name`='$books_name' and `edition`='$edition'");
    ?>
   
    <script type="text/javascript">
                                                              alert("Book returned successfully!");
                                                        window.location="return_books.php";
                                                        </script>
   <?php
}
include "footer.php";
?>