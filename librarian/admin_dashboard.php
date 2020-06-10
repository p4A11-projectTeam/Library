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
   
  
   $nm = 0;
   $nb = 0;
   $nf = 0;
   $sm = 0;
   $ib = 0;
   $ns = 0;
   $retbks=0;
   $notret=0;
   $rm = mysqli_query($db, "SELECT * FROM `messages` WHERE `dusername` = '$_SESSION[librarian]' && `read1`='n' ") or die("Error: " . mysqli_error($db));
   $rb = mysqli_query($db, "SELECT * FROM `books` ") or die("Error: " . mysqli_error($db));
   $rf = mysqli_query($db, "SELECT * FROM `fine` WHERE status='not paid';") or die("Error: " . mysqli_error($db));
   $rsm = mysqli_query($db, "SELECT * FROM `messages` WHERE `susername` = '$_SESSION[librarian]' ") or die("Error: " . mysqli_error($db));
   $rib=mysqli_query($db,"SELECT * FROM `issue_books` WHERE return_status='no';") or die("Error: " . mysqli_error($db));
   $rstud=mysqli_query($db, "SELECT * FROM `student` ") or die("Error: " . mysqli_error($db));
   $rretbks=mysqli_query($db,"SELECT * FROM `issue_books` WHERE return_status='yes';") or die("Error: " . mysqli_error($db));
   $rnotret=mysqli_query($db,"SELECT * FROM `issue_books` WHERE return_status='no';") or die("Error: " . mysqli_error($db));
   $nm = mysqli_num_rows($rm);
   $nb = mysqli_num_rows($rb);
   $nf = mysqli_num_rows($rf);
   $sm = mysqli_num_rows($rsm);
   $ib = mysqli_num_rows($rib);
   $ns = mysqli_num_rows($rstud);
   $retbks = mysqli_num_rows($rretbks);
   $notret = mysqli_num_rows($rnotret);
   
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
                                            <div class="btn-lg  btn-primary"><a href="display_books.php" style="all:unset;cursor:pointer">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div class="h1">
                                                            <?php  echo $nb; ?>
                                                        </div>
                                                        <div style="color:#ffffff">
                                                            Manage Books
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <i class="fa fa-book fa-5x" aria-hidden="true" style="color:#ffffff"></i>
                                                    </div>
                                                </div>
                                            </a></div>    
                                        </div>  
                                        <div class="col-sm-4">
                                            <div class="btn-lg  btn-success"><a href="msg_from_student.php" style="all:unset;cursor:pointer">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div class="h1">
                                                             <?php  echo $nm; ?>
                                                        </div>
                                                        <div style="color:#ffffff">
                                                        Student Messages
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <i class="fa fa-comments-o fa-5x" aria-hidden="true" style="color:#ffffff"></i>
                                                    </div>
                                                </div>
                                            </a></div>   
                                        </div>  
                                        <div class="col-sm-4">
                                            <div class="btn-lg btn-warning"><a href="fine.php" style="all:unset;cursor:pointer">
                                                <div class="row ">
                                                    <div class="col-sm-7">
                                                        <div class="h1" >
                                                            <?php  echo $nf; ?>
                                                        </div>
                                                        <div style="color:#ffffff">
                                                            Fine Due
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
                                            <div class="btn-lg  btn-danger" ><a href="#" style="all:unset;cursor:pointer">
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
                                            <div class="btn-lg"  onMouseOut="this.style.color='#fff'" style="background-color:#af84bd !important; color: white !important; background-color" ><a href="send_notification.php" style="all:unset;cursor:pointer">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div class="h1" >
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
                                            <div class="btn-lg  btn-primary"  onMouseOut="this.style.color='#fff'" style="background-color: rgba(0,100,0, 0.7) !important; color: white !important;"><a href="student_info.php" style="all:unset;cursor:pointer">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div class="h1">
                                                            <?php  echo $ns; ?>
                                                        </div>
                                                        <div style="color:#ffffff">
                                                            Manage Students
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <i class="fa fa-user" aria-hidden="true" style="font-size:80px;color:#ffffff"></i>
                                                    </div>
                                                </div>
                                            </a></div>    
                                        </div>  
                                    </div>
                                </div>
                                <div class="container-fluid" style="padding:15;color:#ffffff00;cursor:default">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime saepe accusantium quibusdam commodi autem earum maiores, temporibus harum laudantium, impedit optio ad a sed amet nulla odio magnam praesentium alias.</div>
                                <!--Third row-->
                                    
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="btn-lg  btn-primary" style="background-color:#4ad983 !important;"><a href="#" style="all:unset;cursor:default">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div class="h1">
                                                            <?php  echo $retbks; ?>
                                                        </div>
                                                        <div style="color:#ffffff">
                                                            Returned
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <i class="fa fa-check" aria-hidden="true" style="font-size:80px;color:#ffffff"></i>
                                                    </div>
                                                </div>
                                            </a></div>    
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="btn-lg  btn-primary" style="background-color:#f01818 !important;"><a href="#" style="all:unset;cursor:default">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div class="h1">
                                                            <?php  echo $notret; ?>
                                                        </div>
                                                        <div style="color:#ffffff">
                                                            Not Returned
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <i class="fa fa-times" aria-hidden="true" style="font-size:80px;color:#ffffff"></i>
                                                    </div>
                                                </div>
                                            </a></div>    
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="btn-lg btn-info">
                                                <div class="row ">
                                                    <div class="col-sm-7">
                                                        <div class="h1" style="color:#ffffff">
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
                                                        <i class="fa fa-calendar fa-5x" aria-hidden="true" color="#fff"></i>
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
        </div>
        <!-- /page content -->
<?php
    include "footer.php";
?>