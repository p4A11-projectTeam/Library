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
                                <h2>Send Messages to Admin</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">

                                <table class="table table-bordered">
                                    
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="title" placeholder="Enter Title">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Message <br>
                                            <textarea name="msg" class="form-control">
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" value="send message" name="submit1" >
                                        </td>
                                    </tr>
                                </table>
                                
                            </form>
                            </div>
                            <table class="table table-bordered">
                                    <tr>
                                    <th>Title</th>
                                    <th>Message</th>
                                    </tr>

                                    <?php
                                        $res = mysqli_query($db, "SELECT * FROM `messages` WHERE dusername='admin' order by id desc ");
                                        while($row=mysqli_fetch_array($res)){
                                            $fullname="";
                                            $res1 = mysqli_query($db, "SELECT * FROM `student` WHERE `username`='$row[susername]' ");
                                            while($row1=mysqli_fetch_array($res1)){
                                                $fullname = $row1["username"];
                                            }
                                            
                                            
                                            echo "<tr>";
                                            echo "<td>"; echo $row["title"]; echo "</td>";
                                            echo "<td>"; echo $row["msg"]; echo "</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <!--rand-->
<?php
    if(isset($_POST["submit1"])){
        mysqli_query($db, "insert into messages values('','$_SESSION[username]','admin','$_POST[title]','$_POST[msg]','n')")
    ?>
    <script type="text/javascript">
        alert("message sent successfully!");
    </script>
    <?php
        
    
    
    }

?>

<?php
    include "footer.php";
?>