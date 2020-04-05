<?php
    session_start();
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
                                <h2>Add Book Information</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">

                                    <table class="table table-bordered">
                                        <tr>
                                            <td><input type="number" class="form-control" placeholder="ISBN" name="isbn" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Book name" name="name" required=""></td>
                                        </tr>
                                        
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Author" name="author" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="number" class="form-control" placeholder="Edition" name="edition" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="number" class="form-control" placeholder="Price" name="price" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="number" class="form-control" placeholder="Quantity" name="qty" required=""></td>
                                        </tr>
                                        <tr>
                                            
                                            <td>Book image<input type="file" id="img" name="img" accept="image/*"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" name="submit1" value="Add" class="btn btn-default submit"></td>
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

<?php
    if(isset($_POST["submit1"])){
        $tm=md5(time());
        $fnm=$_FILES["img"]["name"];
        $dst="./books_image/".$tm.$fnm;
        $dst1="books_image/".$tm.$fnm;

        move_uploaded_file($_FILES["img"]["tmp_name"],$dst);
        $isbn=$_POST["isbn"];
        $name=$_POST["name"];
        $author=$_POST["author"];
        $edition=$_POST["edition"];
        $price=$_POST["price"];
        $qty=$_POST["qty"];
        

        $query = "insert into Books(isbn,name,author,edition,price,qty,img,availability,libusername) values('$isbn','$name','$author','$edition','$price','$qty','$dst1','$qty','$_SESSION[librarian]')"; //Insert query to add book details into the book_info table
        $result = mysqli_query($db,$query);
        ?>

        <script type="text/javascript">
            alert("Book inserted successfully");
        </script>

        <?php
    
    }

?>

<?php
    include "footer.php";
?>