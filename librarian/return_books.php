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
                                <h2>Return Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            
                               <form name="form1" action="" method="post">
                               <table >
                               <tr>
                               <td>
                               <h5> Select the Student USN:</h5>
                               <select name="enr" class="form-control selectpicker">
                               <?php
                               
                               $res=mysqli_query($db,"SELECT distinct `usn` from `issue_books` WHERE return_status='no'");
                               while($row=mysqli_fetch_array($res))
                               {
                                   echo "<option>";
                                   echo $row["usn"];
                                   echo "</option>";
                               }
                               ?>
                               </select>
                               </td>
                               <td>
                                <input type="submit" value="search" name="submit1" class="form-control btn btn-default"
                                                               style="margin-top: 40px;" >
                                 </td>
                               </tr>
                               </table>
                               </form> 
                               <?php
                               if(isset($_POST["submit1"]))
                               {
                                $res=mysqli_query($db,"SELECT  `usn`,`student_name` from `issue_books` where usn='$_POST[enr]' ");
                               
                                
                                while($row=mysqli_fetch_array($res))
                                {
                                    $usn=$row["usn"];
                                   $name=$row["student_name"];

                                }
                                ?>
                                                    <table class="table table-bordered">
                                                             <tr>
                                                                 <td>
                                                    
                                                    <h5 > Student USN:</h5>
                                                    </div>
                                                                 <input type="text" class="form-control" placeholder="USN" name="usn" value="<?php echo $usn; ?>"disabled >
                                                                 </td>
                                                                 <td>
                                                                 <h5> Student Name:</h5>
                                                                 </div>
                                                                 <input type="text" class="form-control" placeholder="student name" name="student_name" value="<?php echo $name; ?>" disabled >
                                                                 </td>
                                                         </tr> 
                                                         </table>
                                                         <?php
                                $res=mysqli_query($db,"SELECT * from `issue_books` where usn='$_POST[enr]' and return_status='no'");
                                 echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "BOOK NAME"; echo "</th>";
                                echo "<th>"; echo "EDITION"; echo "</th>";
                                echo "<th>";echo "Return Book";echo "</th>";
                                echo "</tr>";

                                while($row=mysqli_fetch_array($res))

                                {
                                    echo "<tr>";
                                    echo "<td>"; echo $row["books_name"] ; echo "</td>";
                                    echo "<td>"; echo $row["edition"]; echo "</td>";
                                    echo "<td class='bg-warning'>";?>
                                    <a href="return.php?id=<?php echo $row["issueid"];?>">Return Book</a> 
                                    <?php echo "</td>";


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