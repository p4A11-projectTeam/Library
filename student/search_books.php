<?php
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
                                <h2>Search Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="" method="post">
                            <table class="table">
                            <tr>
                            <td><input type="text" name="t1" placeholder="Enter Books Name" required class="form-control"></td>
                            <td><input class="form-control btn btn-default" type="submit" name="submit1" value="Search Books"  ></td>
                            </tr>
                            </table>
                            </form>
                    <?php
                    if(isset($_POST["submit1"]))
                    {
                        $i=0;
                          $res=mysqli_query($db,"select * from books where name like('%$_POST[t1]%')");
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
                              echo "<br>";
                              echo "<b>" . "edition:". $row["edition"] . "</b>";
                              echo "<b>" . "available:". $row["availability"] . "</b>";
                              echo "<br>";
                              
                              if($i==6)
                              {
                                  echo "</tr>";
                                  echo "<tr>";
                                  $i=0;
                              }


                          }
                          echo "</tr>";
                         echo "</table>";

                    }
                    else{
                        $i=0;
                          $res=mysqli_query($db,"select * from books where availability>0");
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
                              echo "<b>" . "edition:". $row["edition"] . "</b>";
                              echo "<br>";
                              echo "<b>" . "available:". $row["availability"] . "</b>";
                             
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