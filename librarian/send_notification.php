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
                                <h2>Send Messages to Student</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">

                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <select class="form-control" name="dusername">
                                                <?php
                                                $res=mysqli_query($db, "select * from student");
                                                while($row=mysqli_fetch_array($res)){
                                                    ?><option value="<?php echo $row["username"]?>" >
                                                        <?php echo $row["username"]."(". $row["usn"].")";  ?>
                                                    </option><?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="title" placeholder="Enter Title" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Message <br>
                                            <textarea rows="7"
                  cols="50" 
                  name="msg"
                  class="form-control" 
                  required></textarea>
                                            
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <!--rand-->
<?php
    if(isset($_POST["submit1"])){
        mysqli_query($db, "insert into messages values('','$_SESSION[librarian]','$_POST[dusername]','$_POST[title]','$_POST[msg]','n')")
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