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
                                <h2>Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <!--form to search books -->
                            <form name=form1 action="" method="post">
                            <table class="table">
                            <tr>
                                <td><input type="text" name="t1" class="form-control" placeholder="Enter Book Name or Author or Edition"></td>
                                <td><input type="submit" name="submit1" value="search books" class="form-control btn btn-default"></td>
                            </tr>
                            </table>
                            </form>

                                <?php

                                    if(isset($_POST["submit1"])){
                                        $i=0;
                                        $res=mysqli_query($db,"SELECT * FROM `books` where name like ('$_POST[t1]%') or author like ('$_POST[t1]%') or edition like ('$_POST[t1]%') ");
                                        echo "<table class='table table-bordered'>";
                                        echo "<tr>";
                                        echo "<th>"; echo "ISBN"; echo "</th>";
                                        echo "<th>"; echo "Name"; echo "</th>";
                                        echo "<th>"; echo "Author"; echo "</th>";
                                        echo "<th>"; echo "Edition"; echo "</th>";
                                        echo "<th>"; echo "Price"; echo "</th>";
                                        echo "<th>"; echo "Quantity"; echo "</th>";
                                        echo "<th>"; echo "Image"; echo "</th>";
                                        echo "<th>"; echo "Availability"; echo "</th>";
                                        echo "<th>"; echo "Delete"; echo "</th>";
                                        echo "</tr>";
                                        while ($row=mysqli_fetch_array($res)){
                                            $i=$i+1;
                                            echo "<tr>";
                                            echo "<td>"; echo $row["isbn"]; echo "</td>";
                                            echo "<td>"; echo $row["name"]; echo "</td>";
                                            echo "<td>"; echo $row["author"]; echo "</td>";
                                            echo "<td>"; echo $row["edition"]; echo "</td>";
                                            echo "<td>"; echo $row["price"]; echo "</td>";
                                            echo "<td>"; echo $row["qty"]; echo "</td>";
                                            echo "<td>"; ?>
                                            <!--now-->
                                            <img alt=" <?php echo $row["name"] ; ?>" id="myImg<?php echo $i ; ?>" src="<?php echo $row["img"]; ?> " height="100" width="100" style="cursor: pointer"  >
                              
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
                                             <?php echo "</td>";
                                            echo "<td>"; echo $row["availability"]; echo "</td>";
                                            echo "<td class='bg-warning'>"; 
                                            ?> <a href="delete_books.php?id=<?php echo $row["isbn"]; ?>">Delete</a><?php
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</table>";
                                    }else{
                                        $i=0;
                                    $res=mysqli_query($db,"SELECT * FROM `books`");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo "ISBN"; echo "</th>";
                                    echo "<th>"; echo "Name"; echo "</th>";
                                    echo "<th>"; echo "Author"; echo "</th>";
                                    echo "<th>"; echo "Edition"; echo "</th>";
                                    echo "<th>"; echo "Price"; echo "</th>";
                                    echo "<th>"; echo "Quantity"; echo "</th>";
                                    echo "<th>"; echo "Image"; echo "</th>";
                                    echo "<th>"; echo "Availability"; echo "</th>";
                                    echo "<th>"; echo "Delete"; echo "</th>";
                                    echo "</tr>";
                                    while ($row=mysqli_fetch_array($res)){
                                        $i=$i+1;
                                        echo "<tr>";
                                        echo "<td>"; echo $row["isbn"]; echo "</td>";
                                        echo "<td>"; echo $row["name"]; echo "</td>";
                                        echo "<td>"; echo $row["author"]; echo "</td>";
                                        echo "<td>"; echo $row["edition"]; echo "</td>";
                                        echo "<td>"; echo $row["price"]; echo "</td>";
                                        echo "<td>"; echo $row["qty"]; echo "</td>";
                                        echo "<td>"; ?> 
                                        <!--now-->
                                        <img alt=" <?php echo $row["name"] ; ?>" id="myImg<?php echo $i ; ?>" src="<?php echo $row["img"]; ?> " height="100" width="100" style="cursor: pointer"  >
                              
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
                                        <?php echo "</td>";
                                        echo "<td>"; echo $row["availability"]; echo "</td>";
                                        echo "<td class='bg-warning'>"; 
                                        ?> <a href="delete_books.php?isbn=<?php echo $row["isbn"]; ?>">Delete</a><?php
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    
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
<style>
    /* Style the Image Used to Trigger the Modal */
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
  }
  
  #myImg:hover {opacity: 0.7;}
  
  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }
  
  /* Add Animation - Zoom in the Modal */
  .modal-content, #caption {
    animation-name: zoom;
    animation-duration: 0.6s;
  }
  
  @keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
  }
  
  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }
  
  /* 100% Image Width on Smaller Screens */
  @media only screen and (max-width: 700px){
    .modal-content {
      width: 100%;
    }
  }
  </style>

<?php
    include "footer.php";
?>