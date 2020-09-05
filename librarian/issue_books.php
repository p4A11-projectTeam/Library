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

<!--rand-->
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
                            
                                <h2 >Issue Books</h2>

                                <div class="clearfix"></div>


                            </div>
                            <div class="x_content">
                            <div class="container container-table">
		<div class="row vertical-center-row">
			<div class="text-center col-md-6 col-md-offset-3">
                                <form name="form1" action="" method="post"  >
                                    <table>
                                        <tr>
                                            <td>
                                            <h5> Select the Student USN:</h5>
                                                <select  name="enr" class="form-control selectpicker">
                                                    <?php
                                                    $res=mysqli_query($db,"select usn from student");
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
                                                
                                                    <?php
                                                     if(isset($_POST["submit1"]))

                                                     { 
                                                        $res3=mysqli_query($db,"SELECT `first`, `last`, `usn` FROM `student` where usn='$_POST[enr]'");
                                                        while($row3=mysqli_fetch_array($res3))
                                                        {
                                                            $firstname=$row3["first"];
                                                            $lastname=$row3["last"];
                                                            $usn=$row3["usn"];
                                                            $_SESSION['usn']=$usn;
                                                           
                                                            
                                                           

                                                        }

                                                       ?>

                                                    <table class="table table-bordered">
                                                    
                                                             <tr>
                                                             
                                                                 <td>
                                                                 
                                                                 <div class="text-left col-md-3">
                                                    
                                                    <h5 > Student USN:</h5>
                                                    </div>
               
                                                                
                       
                    
                                                                 <input type="text" class="form-control" placeholder="USN" name="usn" value="<?php echo $usn; ?>"disabled >
                                                                 </td>
                                                     </tr>
                                                    
                                                     <tr>
                                                                 <td>
                                                                 <div class="text-left col-md-3">
                                                                 <h5> Student Name:</h5>
                                                                 </div>
                                                                 <input type="text" class="form-control" placeholder="student name" name="student_name" value="<?php echo $firstname." ".$lastname; ?>" required="" >
                                                                 </td>
                                                                 
                                                             
                                                             
                                                                 
                                                         </tr> 
                                                         
                                                         <tr>
                                                         <td>
                                                         <div class="text-left col-md-6">
                                                         <h5> Select the Book to be issued:</h5> 
                                                         </div>
                                                             <select name="books_name"  class="form-control selectpicker">
                                                                 <?php
                                                                 $res=mysqli_query($db,"select  distinct name  from catalog");
                                                                 while($row=mysqli_fetch_array($res))
                                                                 {
                                                                    
                                                                    echo "<option>";
                                                                   echo $row["name"] ;
                                                                    
                                                                   
                                                                   
                                                                    echo "</option>";

                                                                    
                                                                   
                                                                    
                                                                    
                                                                    
                                                                    

                                                                 }
                                                                
                                                                 ?>
                                                                 


                                                             </select>
                                                                                             </td>
                                                         
                                                         
                                                     </tr>
                                                     
                                                        

                                                          
                                                                
                                       
                                                    <tr>
                                                     <td>
                                                     <div class="text-left col-md-9">  
                                                     <h5> Enter the edition (<a href="books_details_with_student.php"> Check The Edition </a>)</h5>
                                                     </div>   
                                                     <input type="number" class="form-control" placeholder="Book edition" name="edition"  required="">
                                                     </td>
                                                     </tr>
                                                     
                                                     <tr>
                                                     
                                                                 <td>
                                                                 <div class="text-left col-md-3">
                                                     <h5> Issue Date:</h5>
                                                     </div>
                                                                 <input type="text" class="form-control" placeholder="issue date" name="issue_date" value="<?php echo date("d-m-yy"); ?>"required="" >
                                                                 </td>
                                                             
                                                             
                                                                 
                                                         </tr> 
                                                        
                                                         <tr>
                                                     
                                                     
                                            
                                        </tr>
                                                       
                                                         <tr>
                                                                 <td>
                                                                 <input type="submit" value="Issue The Book" name="submit2" class="form control btn btn-default" style="background-color: black; color: white"  >
                                                                 </td>
                                                             
                                                             
                                                                 
                                                         </tr>              
                                                     </table>
                                                     
                                                     
                                                    
                                                                </form>
                                                              
                                                       <?php
                                                          
                                                    }
                                                
                                                         ?>
                                                        
                                                        
                                                        
                                                         
                                                                <?php
                                                        if(isset($_POST["submit2"]))

                                                        {  
                                                            $qty=0;
                                                            $res=mysqli_query($db,"SELECT * FROM `catalog` where `name`='$_POST[books_name]'");
                                                            while($row=mysqli_fetch_array($res))
                                                            {
                                                                $qty=$row["availability"];

                                                            }

                                                            if($qty==0)
                                                            {
                                                                ?>
                                                                <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                                                <strong style="...">This book is not available  :(</strong> 
                                                                </div>
                                                                <?php

                                                            }
                                                            
                                                            else{

                                                            
                                                            $usn=$_SESSION['usn'];
                                                            $books_name=$_POST['books_name'];
                                                            $issue_date=date("y/m/d");
                                                           
                                                            $edition=$_POST['edition'];
                                                            $student_name=$_POST['student_name'];
                                                            
                                                            $query="INSERT INTO `issue_books`(`issueid`, `usn`, `books_name`, `issue_date`, `return_date`, `edition`, `student_name`) VALUES (' ','$usn','$books_name','$issue_date',' ','$edition','$student_name')";
                                                          $result= mysqli_query($db,$query);
                                                          mysqli_query($db,"UPDATE `catalog` SET `availability`=`availability`-1 where `name`='$books_name' and `edition`='$edition'");
                                                        
                                                        ?>
                                                        <script type="text/javascript">
                                                              alert("Book issued successfully!");
                                                        window.location.href=window.location.href;
                                                        </script>
                                                        <?php

                                                               }
                                                            }

                                                        ?>
                                                       
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
       