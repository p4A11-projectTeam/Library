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

                   
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Books With Details</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <?php
                            $i=0;
                          $res=mysqli_query($db,"select * from catalog where availability>0 and category='Books'");
                          echo "<table class='table table-bordered'>";
                          echo "<tr>";
                          while($row=mysqli_fetch_array($res))
                          {
                              $i=$i+1;
                              echo "<td>";
                              ?>   <img src="../librarian/<?php echo $row["img"] ; ?>" height="100" width="100"   ><?php
                              echo "<br>";
                              echo "<b>" . $row["name"] . "</b>";
                              echo "<br>";
                              echo "<b>" . "Edition:". $row["edition"] . "</b>";
                              echo "<br>";
                              echo "<b>" . "Shelf-Rack No.:".$row["shelf_rack"] . "</b>";
                              echo "<br>";
                              echo "<b>" . "Total books:". $row["qty"] . "</b>";
                              echo "<br>";
                              echo "<b>" . "Available:". $row["availability"] . "</b>";
                              echo "<br>";
                              echo "<br>";
                              ?> <a href="all_student_of_this_book.php?books_name=<?php echo $row["name"]; ?>" class="bg-warning" style="padding-top: 8px; 
                                                                                                                                    padding-bottom: 8px; 
                                                                                                                                    padding-left: 2px;
                                                                                                                                    padding-right: 3px; 
                                                                                                                                    margin-top:0px;
                                                                                                                                    border-color:black;">Student Record of this book</a> <?php
                              echo "</td>";
                              if($i==6)
                              {
                                  echo "</tr>";
                                  echo "<tr>";
                                  $i=0;
                              }


                          }
                          echo "</tr>";
                         echo "</table>";
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