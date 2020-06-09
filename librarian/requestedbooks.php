<?php
session_start();
if(!isset($_SESSION["librarian"])){

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
                                <h2>Requested Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            

                                    <?php
                                        $res = mysqli_query($db, "SELECT * FROM `request_books` WHERE `status`='no'  ") or die("Error: " . mysqli_error($db));
                                        if(mysqli_num_rows($res) != 0){
                                            ?>
                                            <table class="table table-bordered">
                                    <tr>
                                    <th>USN</th>
                                    <th>Book Name</th>
                                    <th>Edition</th>
                                    <th>Accept Request</th>
                                    </tr>
                                    <?php
                                        while($row=mysqli_fetch_array($res)){

                                            echo "<tr>";
                                            echo "<td>"; echo $row["usn"]; echo "</td>";
                                            echo "<td>"; echo $row["books_name"]; echo "</td>";
                                            echo "<td>"; echo $row["edition"]; echo "</td>";
                                            echo "<td class='bg-info'>"; ?> 
                                        <a href="req_approve.php?id=<?php echo $row["rid"];?>">Accept</a> 
                                        
                                        <?php echo "</td>";
                                       
                                        echo "</tr>";
                                    }
                                    
                                    echo "</table>";
                                }
                                else{
                                    ?>


    <div class="alert alert-danger col-lg-6 col-lg-push-3">
    <h4 style="text-align:center">No Book Requests</h4> 
                                                                </div>
                                                               
                                    <?php

                                
                            }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


<?php
    include "footer.php";
?>