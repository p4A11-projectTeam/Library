<?php   
    include "connection.php";
    if(isset($_GET["isbn"])){
        $isbn = $_GET["isbn"];
        mysqli_query($db, "DELETE FROM `catalog` WHERE `isbn`=$isbn");
    
        ?>
        <script type="text/javascript">
            window.location="display_books.php";
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            window.location="display_books.php";
        </script>
        <?php
    }