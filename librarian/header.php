<?php
    // session_start();
    include "connection.php";
    $tot = 0;
    //echo $_SESSION["username"];
    $result = mysqli_query($db, "SELECT * FROM `messages` WHERE `dusername` = '$_SESSION[librarian]' && `read1`='n' ") or die("Error: " . mysqli_error($db));
    $tot = mysqli_num_rows($result);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>admin | LMS </title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>Book_ish</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/admin.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <h2><?php echo $_SESSION["librarian"]; ?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                        <li><a href="/Library/librarian/admin_dashboard.php"><i class="fa fa-home"></i>Dashboard </a>
                            </li>
                            <li><a href="/Library/librarian/student_info.php"><i class="fa fa-user"></i> All student info </a>

                            </li>
                            <li><a href="/Library/librarian/add_books.php"><i class="fa fa-edit"></i> Add </a>

                            </li>
                            <li><a href="/Library/librarian/display_books.php"><i class="fa fa-desktop"></i> Display </a>

                            </li>
                            <li><a href="/Library/librarian/issue_books.php"><i class="fa fa-indent"></i> Issue Books </a>
                            </li>
                            <li><a href="/Library/librarian/requestedbooks.php"><i class="fa fa-plus"></i> Request Section </a>
                            </li>
                            <li><a href="/Library/librarian/return_books.php"><i class="fa fa-level-down"></i> Return Books </a>

                            </li>
                            <li><a href="/Library/librarian/books_details_with_student.php"><i class="fa fa-info-circle"></i>Books with all info </a>


                            </li>
                            <li><a href="/Library/librarian/fine.php"><i class="fa fa-money"></i>Manage Fines</a>

</li>
                            <li><a href="/Library/librarian/send_notification.php"><i class="fa fa-mail-forward"></i> Send Message </a>

                            </li>

                        </ul>
                    </div>


                </div>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/admin.png" alt=""><?php echo $_SESSION["librarian"]; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false" onclick="window.location='/Library/librarian/msg_from_student.php';">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green" onclick="window.location='/Library/librarian/msg_from_student.php';"><?php  echo $tot; ?></span>
                            </a>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->