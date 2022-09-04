<?php

###### Check whether logged in or not ###########################

if(!isset($_SESSION['adminEmail']))
{
    echo"<script>window.open('admin_login.php?not_admin=You are not an admin!','_self');</script>";
}



require 'functions.php';

if(isset($_POST['insert_product']))
{ 
   
    
    $product_title=$_POST['product_title'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_keywords=$_POST['product_keywords'];
    $product_description=$_POST['product_description'];

    // getting an image
    $product_image=$_FILES['product_image']['name'];
    $product_tmp_image=$_FILES['product_image']['tmp_name'];


    move_uploaded_file($product_tmp_image,"../images/$product_image");
    $insert_query="INSERT INTO `products` 
    (`product_id`, `product_cat`, `product_brand`, `product_title`,
     `product_price`, `product_desc`, `product_image`, `product_keywords`)
      VALUES (NULL,'$product_category', '$product_brands', '$product_title', '$product_price', '$product_description', '$product_image','$product_keywords')"
      ;

    $insert_product=mysqli_query($con,$insert_query);
    if($insert_product)
    {
        echo "<div class='alert alert-danger'>
      <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <h3> You have successfully inserted Product details </h3> 
      </div>";

      

    }



      


}


?>







<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Insert Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../Style_CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	 <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	 <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../Style_CSS/style.css">

    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-primary" >
                        <div class="panel-heading" align="center" id="sidebar">
                            <h3>Dashboard</h3>
                        </div>
                        <div class="panel-body ">
                        <a href="insert_product.php" class="btn btn-default form-control">Insert Product</a>
                        <a href="index.php?view_products" class="btn btn-default form-control">View All Products</a>
                        <a href="" class="btn btn-default form-control">Insert New Category</a>
                        <a href="" class="btn btn-default form-control">View All Categories</a>
                        <a href="" class="btn btn-default form-control">Insert New Brand</a>
                        <a href="" class="btn btn-default form-control">View All Brands</a>
                        <a href="" class="btn btn-default form-control">View Customers</a>
                        <a href="" class="btn btn-default form-control">View Orders</a>
                        <a href="" class="btn btn-default form-control">View Payments</a>
                        <a href="logout.php" class="btn btn-default form-control">Logout</a>
                    
                        </div>
                    </div>
                </div>
            

                        <!-- Insert Post form starts -->
            <div class="col-sm-8">
                <div class="panel panel-primary">
                    <div class="panel-heading" align="center" >
                        <div class="panel-title" required>
                            Insert a Product
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="insert_product.php" method="post" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="product_title">Product Title:</label>
                                <input type="text" name="product_title" class="form-control" id="product_title" required>
                            </div>

                            <div class="form-group">
                                <label for="product_category">Product Category:</label>
                                <select name="product_category" id="" class="form-control" required>
                                <option>Select a Category</option>
                                <?php
                                getcats();

                                ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_brand">Product Brand:</label>
                                <select name="product_brand" id="" class="form-control" required>
                                <option>Select a Brand</option>
                                <?php
                                getbrand();

                                ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_image">Product Image:</label>
                                <input type="file" name="product_image" class="form-control file" id="product_image" required>
                            </div>

                            <div class="form-group">
                                <label for="product_price">Product Price:</label>
                                <input type="text" name="product_price" class="form-control" id="product_price" required>
                            </div>

                            <div class="form-group">
                                <label for="product_keywords">Product Keywords:</label>
                                <input type="text" name="product_keywords" class="form-control" id="product_keywords" required> 
                            </div>

                            <div class="form-group">
                                <label for="product_description">Product Description:</label>
                                <textarea name="product_description" id="" cols="20" rows="10" class="form-control" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary" align="center" name="insert_product" required>Submit</button>

                        </form>
                        </div>
                </div>
            </div>
            <!-- Insert Post form ends -->
            

            

        </div>
    </div>








    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="https://code.jquery.com/jquery.js"></script>
	 <!-- Include all compiled plugins (below), or include individual files as needed --> 
	 <script src="../js/bootstrap.min.js"></script>
</body>
</html>












