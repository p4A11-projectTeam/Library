<?php   
    include "connection.php";
    if(isset($_GET["isbn"])){
        $isbn = $_GET["isbn"];
        mysqli_query($db, "delete from 'books' where 'isbn'=$isbn");
    
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