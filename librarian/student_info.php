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
                                <h2>Student Information</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="" method="post">
                            <table class="table">
                            <tr>
                            <td><input type="text" name="t1" placeholder="Enter Student Name / Username / Email / USN" class="form-control"></td>
                            <td><input class="form-control btn btn-default" type="submit" name="submit1" value="Search Books"  ></td>
                            </tr>
                            </table>
                            </form>
                            <?php

if(isset($_POST["submit1"])){
    if($_POST["t1"]==""){
        $i=0;
        $res=mysqli_query($db,"SELECT * FROM `student`");
        echo "<table class='table table-bordered'>";
        echo "<tr>";
        echo "<th>"; echo "First name"; echo "</th>";
        echo "<th>"; echo "Last name"; echo "</th>";
        echo "<th>"; echo "Username"; echo "</th>";
        echo "<th>"; echo "Email"; echo "</th>";
        echo "<th>"; echo "USN"; echo "</th>";
        echo "<th>"; echo "Status"; echo "</th>";
        echo "<th>"; echo "Approve"; echo "</th>";
        echo "<th>"; echo "Not Approve"; echo "</th>";
        echo "</tr>";
        while ($row=mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row["first"]; echo "</td>";
            echo "<td>"; echo $row["last"]; echo "</td>";
            echo "<td>"; echo $row["username"]; echo "</td>";
            echo "<td>"; echo $row["email"]; echo "</td>";
            echo "<td>"; echo $row["usn"]; echo "</td>";
            echo "<td>"; echo $row["status"]; echo "</td>";
            echo "<td class='bg-info'>"; ?> <a href="approve.php?id=<?php echo $row["id"];?>">Approve</a> <?php echo "</td>";
            echo "<td class='bg-warning'>"; ?> <a href="notapprove.php?id=<?php echo $row["id"];?>">Not Approve</a> <?php echo "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }else{
    $i=0;
    $res=mysqli_query($db,"SELECT * FROM `student` where first like ('$_POST[t1]%') or last like ('$_POST[t1]%') or username like ('$_POST[t1]%') or email like ('$_POST[t1]%') or usn like ('$_POST[t1]%') ");
    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo "First name"; echo "</th>";
                                    echo "<th>"; echo "Last name"; echo "</th>";
                                    echo "<th>"; echo "Username"; echo "</th>";
                                    echo "<th>"; echo "Email"; echo "</th>";
                                    echo "<th>"; echo "USN"; echo "</th>";
                                    echo "<th>"; echo "Status"; echo "</th>";
                                    echo "<th>"; echo "Approve"; echo "</th>";
                                    echo "<th>"; echo "Not Approve"; echo "</th>";
                                    echo "</tr>";
                                    while ($row=mysqli_fetch_array($res)){
                                        $i=$i+1;
                                        echo "<tr>";
                                        echo "<td>"; echo $row["first"]; echo "</td>";
                                        echo "<td>"; echo $row["last"]; echo "</td>";
                                        echo "<td>"; echo $row["username"]; echo "</td>";
                                        echo "<td>"; echo $row["email"]; echo "</td>";
                                        echo "<td>"; echo $row["usn"]; echo "</td>";
                                        echo "<td>"; echo $row["status"]; echo "</td>";
                                        echo "<td class='bg-info'>"; ?> <a href="approve.php?id=<?php echo $row["id"];?>">Approve</a> <?php echo "</td>";
                                        echo "<td class='bg-warning'>"; ?> <a href="notapprove.php?id=<?php echo $row["id"];?>">Not Approve</a> <?php echo "</td>";
                                        echo "</tr>";
                                    }
                                    
                                    echo "</table>";
                                    }}else{
                                        $i=0;
                                    $res=mysqli_query($db,"SELECT * FROM `student`");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo "First name"; echo "</th>";
                                    echo "<th>"; echo "Last name"; echo "</th>";
                                    echo "<th>"; echo "Username"; echo "</th>";
                                    echo "<th>"; echo "Email"; echo "</th>";
                                    echo "<th>"; echo "USN"; echo "</th>";
                                    echo "<th>"; echo "Status"; echo "</th>";
                                    echo "<th>"; echo "Approve"; echo "</th>";
                                    echo "<th>"; echo "Not Approve"; echo "</th>";
                                    echo "</tr>";
                                    while ($row=mysqli_fetch_array($res)){
                                        echo "<tr>";
                                        echo "<td>"; echo $row["first"]; echo "</td>";
                                        echo "<td>"; echo $row["last"]; echo "</td>";
                                        echo "<td>"; echo $row["username"]; echo "</td>";
                                        echo "<td>"; echo $row["email"]; echo "</td>";
                                        echo "<td>"; echo $row["usn"]; echo "</td>";
                                        echo "<td>"; echo $row["status"]; echo "</td>";
                                        echo "<td class='bg-info'>"; ?> <a href="approve.php?id=<?php echo $row["id"];?>">Approve</a> <?php echo "</td>";
                                        echo "<td class='bg-warning'>"; ?> <a href="notapprove.php?id=<?php echo $row["id"];?>">Not Approve</a> <?php echo "</td>";
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


<?php
    include "footer.php";
?>