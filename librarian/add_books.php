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
                                <h2>Add to Catalog</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <div class="container container-table">
		                    <div class="row vertical-center-row">
			                <div class="text-center col-md-6 col-md-offset-3">
                                <form name="form1" action="" method="post" class="col-lg-12" enctype="multipart/form-data">

                                    <table class="table table-bordered table-responsive" >
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Category(Books/Research Papers/Journals/Magazines..)" name="category" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="number" class="form-control" placeholder="ISBN/PAPER NO./ID" name="isbn" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Shelf-Rack No." name="shelf_no" required=""></td>
                                        </tr>
                                        
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Name" name="name" required=""></td>
                                        </tr>
                                        
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Author" name="author" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Edition/Date" name="edition" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="number" class="form-control" placeholder="Price" name="price" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="number" class="form-control" placeholder="Quantity" name="qty" required=""></td>
                                        </tr>
                                        <tr>
                                            
                                            <td><div class="text-left col-md-3">Image</div><input type="file" id="img" name="img" accept="image/*" required=""></td>
                                        </tr>
                                        <tr>

                                            <td><input type="submit" name="submit1" value="Add" class="btn btn-dark btn-lg btn-block submit"></td>

                                        </tr>
                                        
                                    </table>
                                </form>
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
        $shelf=$_POST["shelf_no"];
        $category=$_POST["category"];

        

        $query = "insert into catalog(isbn,name,author,edition,price,qty,img,availability,shelf_rack,category) values('$isbn','$name','$author','$edition','$price','$qty','$dst1','$qty','$shelf','$category')"; //Insert query to add book details into the book_info table
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