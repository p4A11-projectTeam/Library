<?php
include "connection.php";
$id=$_GET["id"];
mysqli_query($db,"UPDATE `student` SET status='yes' where id=$id");



?>

<script type="text/javascript">
    window.location="student_info.php";
</script>