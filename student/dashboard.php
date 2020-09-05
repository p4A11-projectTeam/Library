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
   $res3=mysqli_query($db,"SELECT  `usn` FROM `student` where username='$_SESSION[username]' ");
   while($row3=mysqli_fetch_array($res3))
   {
       $usn=$row3["usn"];
       $_SESSION['usn']=$usn;
   }
  
   $nm = 0;
   $nb = 0;
   $nf = 0;
   $sm = 0;
   $ib = 0;

   $rm = mysqli_query($db, "SELECT * FROM `messages` WHERE `dusername` = '$_SESSION[username]' && `read1`='n' ") or die("Error: " . mysqli_error($db));
   $rb = mysqli_query($db, "SELECT * FROM `catalog` ") or die("Error: " . mysqli_error($db));
   $rf = mysqli_query($db, "SELECT * FROM `fine` WHERE usn='$_SESSION[usn]' and status='not paid'; ") or die("Error: " . mysqli_error($db));
   $rsm = mysqli_query($db, "SELECT * FROM `messages` WHERE `susername` = '$_SESSION[username]' && `read1`='n' ") or die("Error: " . mysqli_error($db));
   $rib=mysqli_query($db,"SELECT * FROM `issue_books` WHERE usn='$_SESSION[usn]'  and return_status='no';") or die("Error: " . mysqli_error($db));
   
   $nm = mysqli_num_rows($rm);
   $nb = mysqli_num_rows($rb);
   $nf = mysqli_num_rows($rf);
   $sm = mysqli_num_rows($rsm);
   $ib = mysqli_num_rows($rib);

   
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Dashboard</h3>
                    </div>

                    
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Library Control Panel</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="btn-lg  btn-primary"><a href="search_books.php" style="all:unset;cursor:pointer">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div class="h1">
                                                            <?php  echo $nb; ?>
                                                        </div>
                                                        <div style="color:#ffffff">
                                                            Books
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <i class="fa fa-book fa-5x" aria-hidden="true" style="color:#ffffff"></i>
                                                    </div>
                                                </div>
                                            </a></div>    
                                        </div>  
                                        <div class="col-sm-4">
                                            <div class="btn-lg  btn-success"><a href="msg_from_lib.php" style="all:unset;cursor:pointer">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div class="h1">
                                                             <?php  echo $nm; ?>
                                                        </div>
                                                        <div style="color:#ffffff">
                                                        Admin Messages
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <i class="fa fa-comments-o fa-5x" aria-hidden="true" style="color:#ffffff"></i>
                                                    </div>
                                                </div>
                                            </a></div>   
                                        </div>  
                                        <div class="col-sm-4">
                                            <div class="btn-lg btn-warning"><a href="fines.php" style="all:unset;cursor:pointer">
                                                <div class="row ">
                                                    <div class="col-sm-7">
                                                        <div class="h1" >
                                                            <?php  echo $nf; ?>
                                                        </div>
                                                        <div style="color:#ffffff">
                                                            Fine
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <i class="fa fa-money fa-5x" aria-hidden="true" style="color:#ffffff"></i>
                                                    </div>
                                            </a></div>    
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid" style="padding:15;color:#ffffff00;cursor:default">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime saepe accusantium quibusdam commodi autem earum maiores, temporibus harum laudantium, impedit optio ad a sed amet nulla odio magnam praesentium alias.</div>
                                <!--second row-->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="btn-lg" style="background-color: rgba(0,100,0, 0.7) !important; color: white !important;"><a href="issued_books.php" style="all:unset;cursor:pointer">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div class="h1">
                                                            <?php  echo $ib; ?>
                                                        </div>
                                                        <div style="color:#ffffff">
                                                            Books Issued
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <i class="fa fa-bookmark fa-5x" aria-hidden="true" style="color:#ffffff"></i>
                                                    </div>
                                                </div>
                                            </a></div>    
                                        </div>  
                                        <div class="col-sm-4">
                                            <div class="btn-lg  btn-danger"><a href="send_msg_to_admin.php" style="all:unset;cursor:pointer">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div class="h1">
                                                             <?php  echo $sm; ?>
                                                        </div>
                                                        <div style="color:#ffffff">
                                                            Send Messages
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <i class="fa fa-comment-o fa-5x" aria-hidden="true" style="color:#ffffff"></i>
                                                    </div>
                                                </div>
                                            </a></div>   
                                        </div>  
                                        <div class="col-sm-4">
                                            <div class="btn-lg btn-info">
                                                <div class="row ">
                                                    <div class="col-sm-7">
                                                        <div class="h1" >
                                                           Date
                                                        </div>
                                                        <div>
                                                            <span id="datetime"></span>

                                                            <script>
                                                            var dt = new Date();
                                                            document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
                                                            </script>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <i class="fa fa-calendar fa-5x" aria-hidden="true"></i>
                                                    </div>
                                            </div>    
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
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