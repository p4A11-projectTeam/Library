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
   
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Manage Fine</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                

                            <?php
                            $a  = date("Y-m-d");
                            $x=mysqli_query($db," SELECT * FROM `issue_books` where `return_status`='no' ");
                            
                            while($row=mysqli_fetch_array($x))
                            {
                                $issueid=$row["issueid"];
                                $usn=$row["usn"];
                                $books_name=$row["books_name"];
                                $edition=$row["edition"];
                                $issue_date=$row["issue_date"];
                                $ddate=date('Y-m-d', strtotime($issue_date. ' + 15 days'));
                                if($ddate < $a){
                               mysqli_query($db,"INSERT INTO `fine`(`issue_id`,`usn`,`book_name`,`edition`,`issue_date`,`return_date`,`amount`) VALUES('$issueid','$usn','$books_name','$edition','$issue_date',' ',' ')");
                                }

                            }
                            

                                    $res5=mysqli_query($db,"SELECT * FROM `fine` where `status`='not paid'");
                                    if(mysqli_num_rows($res5) != 0){

                                    
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo "USN"; echo "</th>";
                                    echo "<th>"; echo "BOOK NAME"; echo "</th>";
                                    echo "<th>"; echo "EDITION"; echo "</th>";
                                    echo "<th>"; echo "FINE"; echo "</th>";
                                    echo "<th>"; echo "APPROVE PAYMENT"; echo "</th>";
                                    echo "</tr>";
                                    while ($row5=mysqli_fetch_array($res5)){
                                        echo "<tr>";
                                        echo "<td>"; echo $row5["usn"]; echo "</td>";
                                        echo "<td>"; echo $row5["book_name"]; echo "</td>";
                                        echo "<td>"; echo $row5["edition"]; echo "</td>";
                                        $fiid=$row5["fiid"];
                                        $issue_date1=$row5["issue_date"];
                                        $rdate=date('Y-m-d', strtotime($issue_date1. ' + 15 days'));
                                        $diff = abs(strtotime($a) - strtotime($rdate))/86400;
                                        $fine_rate= 5;
                                        $fine= $diff * $fine_rate;
                                        mysqli_query($db,"UPDATE `fine` SET `amount`= '$fine' where `fiid`='$fiid' ");
                                        echo "<td>"; echo $row5["amount"]; echo "</td>";
                                        
                                        
                                        echo "<td class='bg-info'>"; ?> 
                                        <a href="fine_approve.php?id=<?php echo $row5["fiid"];?>">Approve</a> 
                                        
                                        <?php echo "</td>";
                                       
                                        echo "</tr>";
                                    }
                                    
                                    echo "</table>";

                                }
                                else{
                                    ?>


    <div class="alert alert-danger col-lg-6 col-lg-push-3">
    <h4 style="text-align:center">No Fines Due</h4> 
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