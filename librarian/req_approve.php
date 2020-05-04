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
mysqli_query($db,"UPDATE `request_books` SET `status`='yes' where `rid`=$id");



?>

<script type="text/javascript">
alert("Book Request Accepted Successfully!");
    window.location="requestedbooks.php";
</script>