<?php
    session_start();
    if(!isset($_SESSION["username"])){

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
                                <h2>Fine Section</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <?php
                            $res3=mysqli_query($db,"SELECT  `usn` FROM `student` where username='$_SESSION[username]' ");
                            while($row3=mysqli_fetch_array($res3))
                            {
                                $usn=$row3["usn"];
                                $_SESSION['usn']=$usn;
                            }
                            $a=date("Y-m-d");
                           $res=mysqli_query($db,"SELECT * FROM `fine` where usn='$_SESSION[usn]'  and `status`='not paid' ");
                           if(mysqli_num_rows($res) != 0){
                           echo "<table class='table table-bordered'>";
                           echo "<tr>";
                           
                           echo "<th>"; echo "BOOK NAME"; echo "</th>";
                           echo "<th>"; echo "EDITION"; echo "</th>";
                           echo "<th>"; echo "ISSUE DATE"; echo "</th>";
                           echo "<th>"; echo "FINE"; echo "</th>";
                           
                           echo "</tr>";
                           while($row=mysqli_fetch_array($res)){
                               echo "<tr>";
                               
                               echo "<td>"; echo $row["book_name"]; echo "</td>";
                               echo "<td>"; echo $row["edition"]; echo "</td>";
                               echo "<td>"; echo $row["issue_date"]; echo "</td>";
                               $fiid=$row["fiid"];
                               $issue_date=$row["issue_date"];
                               $rdate=date('Y-m-d', strtotime($issue_date. ' + 15 days'));
                                        $diff = abs(strtotime($a) - strtotime($rdate))/86400;
                                        $fine_rate= 5;
                                        $fine= $diff * $fine_rate;
                                        mysqli_query($db,"UPDATE `fine` SET `amount`= '$fine' where `fiid`='$fiid'");
                               echo "<td>"; echo $row["amount"]; echo "</td>";
                           }
                           echo "</table>";
                        }
                        else{
                            ?>


                            <div class="alert alert-danger col-lg-6 col-lg-push-3">
                            <h4 style="text-align:center">No Fines Available</h4> 
                                                                                        </div>
                                                                                       
                                                            <?php
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
    include "footer.php";
?>
   
