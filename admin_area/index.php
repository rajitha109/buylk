<?php
###### Start session to log in to the system
session_start();
if(!isset($_SESSION['adminEmail']))
{
    echo"<script>window.open('admin_login.php?not_admin=You are not an admin!','_self');</script>";
}


include'functions.php';
/*Update products */
if(isset($_POST['update_product']))
{
    $id=$_SESSION['edit_id'];
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


    $update="UPDATE `products` SET `product_cat`='$product_category',`product_brand`='$product_brands',`product_title`='$product_title',`product_price`='$product_price',`product_desc`='$product_description',`product_image`='$product_image',`product_keywords`='$product_keywords' WHERE `product_id`='$id'";
    $run_update=mysqli_query($con,$update);
    if($run_update)
    {
        echo "<script>alert('Successfully updated');</script>";
    }
}

/* Delete Products yes or no */
if(isset($_POST['yes']))
{
    $id=$_SESSION['remove_id'];
    $delete="DELETE from `products` WHERE `product_id`='$id' ";
    $run_delete=mysqli_query($con,$delete);
    if($run_delete)
    {
        echo "<script>alert('You have successfully Deleted');</script>";
    }

}
if(isset($_POST['no']))
{
    echo "<script>window.open('index.php','_self');</script>";
}

/* Insert Category */
if(isset($_POST['insert_category']))
{ 
   
    
    $category_title=$_POST['category_title'];
    $insert_query="INSERT INTO `categories`(`cat_id`, `cat_title`) VALUES  (NULL,'$category_title')";

    $insert_product=mysqli_query($con,$insert_query);
    if($insert_product)
    {
        echo "<div class='alert alert-danger'>
      <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <h3> You have successfully inserted Category details </h3> 
      </div>";

      

    }     


}

/*  Update category */
if(isset($_POST['update_cat']))
{
    
    
    $category_title=$_POST['category_title'];
    $cat_id=$_SESSION['cat_edit_id'];
    $update="UPDATE `categories` SET `cat_title`='$category_title' WHERE `cat_id`='$cat_id'" ;
    $run_update=mysqli_query($con,$update);
    if($run_update)
    {
        echo"<script>alert('successfully updated');
        window.open('index.php','self');</script>";

    }

}

/* */

/*Remove Category  yes or no */
if(isset($_POST['cat_yes']))
{
    $cat_id=$_SESSION['cat_remove_id'];
    $delete="DELETE from `categories` WHERE `cat_id`='$cat_id' ";
    $run_delete=mysqli_query($con,$delete);
    if($run_delete)
    {
        echo "<script>alert('You have successfully Deleted');</script>";
    }

}
if(isset($_POST['cat_no']))
{
    echo "<script>window.open('index.php','_self');</script>";
}


/* ***************************** Brand ********************************** */

/* Insert brand */
if(isset($_POST['insert_brand']))
{ 
   
    
    $brand_title=$_POST['brand_title'];
    $insert_query="INSERT INTO `brands`(`brand_id`, `brand_title`) VALUES  (NULL,'$brand_title')";

    $insert_brand=mysqli_query($con,$insert_query);
    if($insert_brand)
    {
        echo "<div class='alert alert-danger'>
      <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <h3> You have successfully inserted brand details </h3> 
      </div>";

      

    }     


}

/*  Update brand */
if(isset($_POST['update_brand']))
{
    
    
    $brand_title=$_POST['brand_title'];
    $bra_id=$_SESSION['bra_edit_id'];
    $update="UPDATE `brands` SET `brand_title`='$brand_title' WHERE `brand_id`='$bra_id'" ;
    $run_update=mysqli_query($con,$update);
    if($run_update)
    {
        echo"<script>alert('successfully updated');
        window.open('index.php','self');</script>";

    }

}



/*Remove brand  yes or no */
if(isset($_POST['bra_yes']))
{
    $bra_id=$_SESSION['bra_remove_id'];
    $delete="DELETE from `brands` WHERE `brand_id`='$bra_id' ";
    $run_delete=mysqli_query($con,$delete);
    if($run_delete)
    {
        echo "<script>alert('You have successfully Deleted');</script>";
    }

}
if(isset($_POST['bra_no']))
{
    echo "<script>window.open('index.php','_self');</script>";
}


/* ************************** Customer remove or not *************** */
if(isset($_POST['cus_yes']))
{
    $cus_email=$_SESSION['customer_email_remove'];
    $delete="DELETE from `customers` WHERE `customer_email`='$cus_email' ";
    $run_delete=mysqli_query($con,$delete);
    if($run_delete)
    {
        echo "<script>alert('You have successfully Deleted');</script>";
    }

}
if(isset($_POST['cus_no']))
{
    echo "<script>window.open('index.php','_self');</script>";
}


?>







<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin panel</title>
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
                    <a href="insert_product.php" class="btn btn-default form-control">Insert Products</a>
                    <a href="index.php?view_products" class="btn btn-default form-control">View All Products</a>
                    <a href="index.php?insert_cat" class="btn btn-default form-control">Insert New Category</a>
                    <a href="index.php?view_categories" class="btn btn-default form-control">View All Categories</a>
                    <a href="index.php?insert_bra" class="btn btn-default form-control">Insert New Brand</a>
                    <a href="index.php?view_brands" class="btn btn-default form-control">View All Brands</a>
                    <a href="index.php?view_customers" class="btn btn-default form-control">View Customers</a>
                    <a href="" class="btn btn-default form-control">View Orders</a>
                    <a href="" class="btn btn-default form-control">View Payments</a>
                    <a href="logout.php" class="btn btn-default form-control">Logout</a>
                
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
            <?php
            if(isset($_GET['view_products']))
            {
                include 'view_products.php';
            }

            if(isset($_GET['edit']))
            {
                include 'edit_product.php';
            }

            if(isset($_GET['remove']))
            {
                include 'remove_product.php';
            }

            if(isset($_GET['insert_cat']))
            {
                include 'insert_category.php';
            }
            
            if(isset($_GET['view_categories']))
            {
                include 'view_categories.php';
            }

            if(isset($_GET['cat_edit']))
            {
                include 'edit_category.php';
            }

            if(isset($_GET['cat_remove']))
            {
                include 'remove_category.php';
            }
            if(isset($_GET['insert_bra']))
            {
                include 'insert_brand.php';
            }

            if(isset($_GET['view_brands']))
            {
                include 'view_brands.php';
            }

            if(isset($_GET['bra_edit']))
            {
                include 'edit_brands.php';
            }
            
            if(isset($_GET['bra_remove']))
            {
                include 'remove_brand.php';
            }

            if(isset($_GET['view_customers']))
            {
                include 'view_customers.php';
            }

            if(isset($_GET['remove_customer']))
            {
                include 'remove_customer.php';
            }
            

            


            ?>
            </div>

            <div class="alert alert-success"><h3 align="center"><?php echo @$_GET['logged_in'];?></h3></div>

        
            
            

        </div>
    </div>







    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="https://code.jquery.com/jquery.js"></script>
	 <!-- Include all compiled plugins (below), or include individual files as needed --> 
	 <script src="../js/bootstrap.min.js"></script>

     
</body>
</html>