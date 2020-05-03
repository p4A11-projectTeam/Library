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


$id=$_GET["id"];
$d  = date("Y-m-d");

mysqli_query($db," UPDATE `fine` SET `return_date` = '$d' WHERE `fiid`= '$id'  ");
mysqli_query($db," UPDATE `fine` SET `status`='paid' WHERE `fiid`= '$id'  ");
$res3=mysqli_query($db," SELECT `issue_id` FROM `fine` WHERE `fiid`= '$id' ");
while($row3=mysqli_fetch_array($res3))
{
$issue_id=$row3["issue_id"];

}
$return_date=date("Y-m-d");
mysqli_query($db,"UPDATE `issue_books` SET `return_date`= '$return_date' WHERE `issueid`='$issue_id' ");
mysqli_query($db,"UPDATE `issue_books` SET `return_status`='yes' WHERE `issueid`='$issue_id' ");
?>
 <script type="text/javascript">
                                                              alert("Fine Paid successfully!");
                                                        window.location="fine.php";
                                                        </script>
   <?php

include "footer.php";
?>
<!--AND and -->