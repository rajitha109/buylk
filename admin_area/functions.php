<?php
//connection
$con=mysqli_connect("localhost","root","","ecommerce");
//getting the categories
function getcats()
{
    global $con;
    $getcat="SELECT * from `categories`";
    $run_cats=mysqli_query($con,$getcat);

    while($row_cats=mysqli_fetch_array($run_cats))
    {
        $cat_id=$row_cats['cat_id'];
        $cat_title=$row_cats['cat_title'];
        echo "<option>$cat_title</option><br>";



    }

    # code...
}


//getting the brands
function getbrand()
{
    global $con;
    $get_brand="SELECT * FROM `brands`";
    $run_brand=mysqli_query($con,$get_brand);
    while($row_brand=mysqli_fetch_array($run_brand))
    {
        $brand_id=$row_brand['brand_id'];
        $brand_title=$row_brand['brand_title'];

        echo "<option>$brand_title</option><br>";


    }

}
?>