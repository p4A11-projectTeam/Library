<?php
     session_start();
     if(!isset($_SESSION["username"])){
 
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
                    <!--
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
-->
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Search in Catalog</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="" method="post">
                            <table class="table">
                            <tr>
                            <td><input type="text" name="t1" placeholder="Search for..." class="form-control"></td>
                            <td><input class="form-control btn btn-default" type="submit" name="submit1" value="Search"  ></td>
                            </tr>
                            </table>
                            </form>
                    <?php
                    if(isset($_POST["submit1"]))
                    {
                        if($_POST["t1"]==""){
                           
                                $i=0;
                                  $res=mysqli_query($db,"select * from catalog where availability>0");
                                  echo "<table class='table table-bordered'>";
                                  echo "<tr>";
                                  while($row=mysqli_fetch_array($res))
                                  {
                                      $i=$i+1;
                                      echo "<td>";
                                      ?>   <img alt=" <?php echo $row["name"] ; ?>" id="myImg<?php echo $i ; ?>" src="../librarian/<?php echo $row["img"] ; ?>" height="100" width="100"  style="cursor: pointer" >
                                      <!-- The Modal -->
                                    <div id="myModal<?php echo $i ; ?>" class="modal">
        
                                    <!-- The Close Button -->
                                    <span class="close<?php echo $i ; ?>" style=" position: absolute;
                                                                                    top: 35px;
                                                                                    right: 85px;
                                                                                    color: #f1f1f1;
                                                                                    font-size: 40px;
                                                                                    font-weight: bold;
                                                                                    transition: 0.3s;
                                                                                    cursor: pointer"
                                                                                    
                                                                                    >&times;</span>
        
                                    <!-- Modal Content (The Image) -->
                                    <img class="modal-content" id="img01<?php echo $i ; ?>" style="margin: auto;
                                                                                            display: block;
                                                                                            width: 80%;
                                                                                            max-width: 700px;">
        
                                    <!-- Modal Caption (Image Text) -->
                                    <div id="caption<?php echo $i ; ?>" style="margin: auto;
                                                                            font-size: 30px;
                                                                            display: block;
                                                                            width: 80%;
                                                                            max-width: 700px;
                                                                            text-align: center;
                                                                            color: #ccc;
                                                                            padding: 10px 0;
                                                                            height: 150px;"></div>
                                    </div>
                                    <script type="text/javascript">
                                    var modal = document.getElementById("myModal<?php echo $i ; ?>");
        
                                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                                    var img = document.getElementById("myImg<?php echo $i ; ?>");
                                    var modalImg = document.getElementById("img01<?php echo $i ; ?>");
                                    var captionText = document.getElementById("caption<?php echo $i ; ?>");
                                    img.onclick = function(){
                                    modal.style.display = "block";
                                    modalImg.src = this.src;
                                    captionText.innerHTML = this.alt;
                                    }
        
                                    // Get the <span> element that closes the modal
                                    var span = document.getElementsByClassName("close<?php echo $i ; ?>")[0];
        
                                    // When the user clicks on <span> (x), close the modal
                                    span.onclick = function() {
                                    modal.style.display = "none";
                                    }
        
                                    </script>
        
        
                                      <?php
                                       echo "<br>";
                                       echo "<b>" . "Category:".$row["category"] . "</b>";
                                      echo "<br>";
                                      echo "<b>" . $row["name"] . "</b>";
                                      echo "<br>";
                                      echo "<b>" . "edition/date:". $row["edition"] . "</b>";
                                      echo "<br>";
                                      echo "<b>" . "shelf-rack no. :".$row["shelf_rack"] . "</b>";
                                      echo "<br>";
                                      echo "<b>" . "available:". $row["availability"] . "</b>";
                                     
                                      echo "</td>";
                                      if($i==4)
                                      {
                                          echo "</tr>";
                                          echo "<tr>";
                                          $i=0;
                                      }
        
        
                                  }
                                  echo "</tr>";
                                 echo "</table>";
        
                            
                        }else{
                        $i=0;
                          $res=mysqli_query($db,"select * from catalog where name like('%$_POST[t1]%') or author like ('$_POST[t1]%') or edition like ('$_POST[t1]%') or category like ('$_POST[t1]%')");
                          echo "<table class='table table-bordered'>";
                          echo "<tr>";
                          while($row=mysqli_fetch_array($res))
                          {
                              $i=$i+1;
                              echo "<td>";
                              ?>   <img alt=" <?php echo $row["name"] ; ?>" id="myImg<?php echo $i ; ?>" src="../librarian/<?php echo $row["img"] ; ?>" height="100" width="100" style="cursor: pointer"  >
                              
                              <!-- The Modal -->
                            <div id="myModal<?php echo $i ; ?>" class="modal">

                            <!-- The Close Button -->
                            <span class="close<?php echo $i ; ?>" style=" position: absolute;
                                                                            top: 35px;
                                                                            right: 85px;
                                                                            color: #f1f1f1;
                                                                            font-size: 40px;
                                                                            font-weight: bold;
                                                                            transition: 0.3s;
                                                                            cursor: pointer">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img class="modal-content" id="img01<?php echo $i ; ?>" style="margin: auto;
                                                                                    display: block;
                                                                                    width: 80%;
                                                                                    max-width: 700px;">

                            <!-- Modal Caption (Image Text) -->
                            <div id="caption<?php echo $i ; ?>" style="margin: auto;
                                                                        font-size: 30px;
                                                                        display: block;
                                                                        width: 80%;
                                                                        max-width: 700px;
                                                                        text-align: center;
                                                                        color: #ccc;
                                                                        padding: 10px 0;
                                                                        height: 150px;"></div>
                            </div>
                            <script type="text/javascript">
                            var modal = document.getElementById("myModal<?php echo $i ; ?>");

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById("myImg<?php echo $i ; ?>");
                            var modalImg = document.getElementById("img01<?php echo $i ; ?>");
                            var captionText = document.getElementById("caption<?php echo $i ; ?>");
                            img.onclick = function(){
                            modal.style.display = "block";
                            modalImg.src = this.src;
                            captionText.innerHTML = this.alt;
                            }

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close<?php echo $i ; ?>")[0];

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                            modal.style.display = "none";
                            }

                            </script>
                            
                              <?php
                               echo "<br>";
                               echo "<b>" . "Category:".$row["category"] . "</b>";
                              echo "<br>";
                              echo "<b>" . $row["name"] . "</b>";
                              echo "<br>";
                              echo "<b>" . "edition/date:". $row["edition"] . "</b>";
                              echo "<br>";
                              echo "<b>" . "shelf-rack no. :".$row["shelf_rack"] . "</b>";
                              echo "<br>";
                              echo "<b>" . "available:". $row["availability"] . "</b>";
                              echo "<br>";
                              
                              if($i==4)
                              {
                                  echo "</tr>";
                                  echo "<tr>";
                                  $i=0;
                              }


                          }
                          echo "</tr>";
                         echo "</table>";

                    }}
                    else{
                        $i=0;
                          $res=mysqli_query($db,"select * from catalog where availability>0");
                          echo "<table class='table table-bordered'>";
                          echo "<tr>";
                          while($row=mysqli_fetch_array($res))
                          {
                              $i=$i+1;
                              echo "<td>";
                              ?>   <img alt=" <?php echo $row["name"] ; ?>" id="myImg<?php echo $i ; ?>" src="../librarian/<?php echo $row["img"] ; ?>" height="100" width="100"  style="cursor: pointer" >
                              <!-- The Modal -->
                            <div id="myModal<?php echo $i ; ?>" class="modal">

                            <!-- The Close Button -->
                            <span class="close<?php echo $i ; ?>" style=" position: absolute;
                                                                            top: 35px;
                                                                            right: 85px;
                                                                            color: #f1f1f1;
                                                                            font-size: 40px;
                                                                            font-weight: bold;
                                                                            transition: 0.3s;
                                                                            cursor: pointer"
                                                                            
                                                                            >&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img class="modal-content" id="img01<?php echo $i ; ?>" style="margin: auto;
                                                                                    display: block;
                                                                                    width: 80%;
                                                                                    max-width: 700px;">

                            <!-- Modal Caption (Image Text) -->
                            <div id="caption<?php echo $i ; ?>" style="margin: auto;
                                                                    font-size: 30px;
                                                                    display: block;
                                                                    width: 80%;
                                                                    max-width: 700px;
                                                                    text-align: center;
                                                                    color: #ccc;
                                                                    padding: 10px 0;
                                                                    height: 150px;"></div>
                            </div>
                            <script type="text/javascript">
                            var modal = document.getElementById("myModal<?php echo $i ; ?>");

                            // Get the image and insert it inside the modal - use its "alt" text as a caption
                            var img = document.getElementById("myImg<?php echo $i ; ?>");
                            var modalImg = document.getElementById("img01<?php echo $i ; ?>");
                            var captionText = document.getElementById("caption<?php echo $i ; ?>");
                            img.onclick = function(){
                            modal.style.display = "block";
                            modalImg.src = this.src;
                            captionText.innerHTML = this.alt;
                            }

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close<?php echo $i ; ?>")[0];

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                            modal.style.display = "none";
                            }

                            </script>


                              <?php
                              echo "<br>";
                              echo "<b>" . "Category:".$row["category"] . "</b>";
                              echo "<br>";
                              echo "<b>" . $row["name"] . "</b>";
                              echo "<br>";
                              echo "<b>" . "edition/date:". $row["edition"] . "</b>";
                              echo "<br>";
                              echo "<b>" . "shelf-rack no. :". $row["shelf_rack"] . "</b>";
                              echo "<br>";
                              echo "<b>" . "available:". $row["availability"] . "</b>";
                             
                              echo "</td>";
                              if($i==4)
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