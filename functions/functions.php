<?php
//connection
$con=mysqli_connect("localhost","root","","ecommerce");

if(mysqli_connect_errno($con))
{
    echo "<div class=\"alert alert-danger\" >The Connection was not established</div>";
    
}


//getting IP Address
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


//Adding to shopping cart

function cart()
{
    $ip=getRealIpAddr();
    
    if(isset($_GET['pro_id']))
    {
        
        global $con;
        $pro_id=$_GET['pro_id'];
        $check="SELECT * from cart WHERE `ip_add`='$ip' AND `p_id`='$pro_id'";
        $run_check=mysqli_query($con,$check);

        if(mysqli_num_rows($run_check)>0)
        {
            echo "<div class=\"alert alert-warning\"><h5>Already Added to the cart</h5></div>";
        }
        else{
            $insert_cart="INSERT INTO cart (`p_id`,`ip_add`,`qty`) VALUES ('$pro_id','$ip','1')";
            $run_insert=mysqli_query($con,$insert_cart);
            echo "<script>window.open('index.php','_self')</script>";
        }



    }


}



//getting total count of items
function totalitems()
{
    global $con;
    if(isset($_GET['pro_id']))
    {
        $ip_add=getRealIpAddr();
        $query="SELECT * FROM cart WHERE `ip_add`='$ip_add'";
        $run_query=mysqli_query($con,$query);
        $count=mysqli_num_rows($run_query);
        echo"<span class=\"label label-danger\">$count</span>";

    }
    else
    {
        
        $ip_add=getRealIpAddr();
        $query="SELECT * FROM cart WHERE `ip_add`='$ip_add'";
        $run_query=mysqli_query($con,$query);
        $count=mysqli_num_rows($run_query);
        echo"<span class=\"label label-danger\">$count</span>";

    }

    # code...
}


//getting total price of the items

function getTotalPrice()
{
    
    $total=0;
    global $con;
    $ip=getRealIpAddr();
    $sel_price="SELECT * FROM cart WHERE `ip_add`='$ip' ";
    $run_price=mysqli_query($con,$sel_price);
    while($row_price=mysqli_fetch_array($run_price))
    {
        $p_id=$row_price['p_id'];
        $product_price="SELECT * FROM `products` WHERE `product_id`='$p_id'";
        $run_product_price=mysqli_query($con,$product_price);
        while($row_quantity=mysqli_fetch_array($run_product_price))
        {
            $product_price=array($row_quantity['product_price']);
            $value=array_sum($product_price);
            $total+=$value;

        }

    
    }
    return $total;

    //echo "<span class=\"label label-success\">Rs $total.00</span>";
}
        


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
        echo "<a class=\"btn btn-default form-control\" href='index.php?cat=$cat_id'>$cat_title</a><br>";



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

        echo "<a class=\"btn btn-default form-control\" href='index.php?brand=$brand_id'>$brand_title</a><br>";


    }

}




//Displaying products
function displayProducts()
{
    if(!isset($_GET['cat']))
    {
        if(!isset($_GET['brand']))
        {
            global $con;
            $select_query="SELECT * FROM `products` ORDER BY RAND() LIMIT 0,6";
            $run_query=mysqli_query($con,$select_query);

            while($row_products=mysqli_fetch_array($run_query)){
                $product_id=$row_products['product_id'];
                $product_title=$row_products['product_title'];
                $product_brand=$row_products['product_brand'];
                $product_category=$row_products['product_cat'];
                $product_image=$row_products['product_image'];
                $product_price=$row_products['product_price'];
                $product_description=$row_products['product_desc'];
                $product_keywords=$row_products['product_keywords'];

                echo " 
                <div class=\"col-sm-4\">
                    <div class=\"panel panel-success\">
                                            <div class=\"panel-heading\">
                                                <div class=\"panel-title\" align='center'>
                                                    $product_title
                                                </div>

                                            </div>
                                            <div class=\"panel-body\" align=\"center\">
                                        
                                            <img src='images/$product_image' width=\"185\" height=\"225\" ><br>
                                            <br>
                                            
                                            <a href=\"details.php?pro_id=$product_id\" class=\"btn btn-info\">Details</a>
                                            <a href=\"index.php?pro_id=$product_id\" class=\"btn btn-warning\">Add to Cart</a>
                                            
                                            </div>
                                            <div class=\"panel-footer\">
                                                <span style=\"color:red\">Rs $product_price.00</span><br>
                                                <h6>$product_keywords</h6>
                                            </div>
                                                

                                            
                                            

                                            
                                        
                    
                    </div>
                </div>
                ";
                


            }


        }

    
    }
}


//Displaying products according to category 
function display_according_to_cat()
{
    if(isset($_GET['cat']))
    {
        
            $product_cat=$_GET['cat'];
            global $con;
            $select_query="SELECT * FROM `products` WHERE `product_cat`='$product_cat' ";
            $run_query=mysqli_query($con,$select_query);
            ##### count no of products
            $count=mysqli_num_rows($run_query);

            if($count==0)
                    {
                        echo "<div class=\"alert alert-danger col-sm-6\"><h3>There is no product available</h3></div>";
                        
                    }
            

            while($row_products=mysqli_fetch_array($run_query)){
                $product_id=$row_products['product_id'];
                $product_title=$row_products['product_title'];
                $product_brand=$row_products['product_brand'];
                $product_category=$row_products['product_cat'];
                $product_image=$row_products['product_image'];
                $product_price=$row_products['product_price'];
                $product_description=$row_products['product_desc'];
                $product_keywords=$row_products['product_keywords'];

                
            
            

                echo " 
                <div class=\"col-sm-4\">
                    <div class=\"panel panel-success\">
                                            <div class=\"panel-heading\">
                                                <div class=\"panel-title\" align='center'>
                                                    $product_title
                                                </div>

                                            </div>
                                            <div class=\"panel-body\" align=\"center\">
                                        
                                            <img src='images/$product_image' width=\"185\" height=\"225\" ><br>
                                            <br>
                                            
                                            <a href=\"details.php?pro_id=$product_id\" class=\"btn btn-info\">Details</a>
                                            <a href=\"index.php?pro_id=$product_id\" class=\"btn btn-warning\">Add to Cart</a>
                                            
                                            </div>
                                            <div class=\"panel-footer\">
                                                <span style=\"color:red\">Rs $product_price.00</span><br>
                                                <h6>$product_keywords</h6>
                                            </div>
                    </div>

                   
                </div>
                ";
                
            

            }


        

    
    }
}


//Displaying products according to category 
function display_according_to_brand()
{
    if(isset($_GET['brand']))
    {
        
            $product_brand=$_GET['brand'];
            global $con;
            $select_query="SELECT * FROM `products` WHERE `product_brand`='$product_brand' ";
            $run_query=mysqli_query($con,$select_query);
            ##### count no of products 
            $count=mysqli_num_rows($run_query);
            if($count==0)
                    {
                        echo "<div class=\"alert alert-danger col-sm-6\"><h3>There is no product available</h3></div>";
                        
                    }

            while($row_products=mysqli_fetch_array($run_query)){
                $product_id=$row_products['product_id'];
                $product_title=$row_products['product_title'];
                $product_brand=$row_products['product_brand'];
                $product_category=$row_products['product_cat'];
                $product_image=$row_products['product_image'];
                $product_price=$row_products['product_price'];
                $product_description=$row_products['product_desc'];
                $product_keywords=$row_products['product_keywords'];

            
                //</div>
            

                echo " 
                <div class=\"col-sm-4\">
                    <div class=\"panel panel-success\">
                                            <div class=\"panel-heading\">
                                                <div class=\"panel-title\" align='center'>
                                                    $product_title
                                                </div>

                                            </div>
                                            <div class=\"panel-body\" align=\"center\">
                                        
                                            <img src='images/$product_image' width=\"185\" height=\"225\" ><br>
                                            <br>
                                            
                                            <a href=\"details.php?pro_id=$product_id\" class=\"btn btn-info\">Details</a>
                                            <a href=\"index.php?pro_id=$product_id\" class=\"btn btn-warning\">Add to Cart</a>
                                            
                                            </div>
                                            <div class=\"panel-footer\">
                                                <span style=\"color:red\">Rs $product_price.00</span><br>
                                                <h6>$product_keywords</h6>
                                            </div>                                     
                    
                    </div>
                    
                </div>
                ";
        


            }


        

    
    }
}



//Displaying All products
function displayAllProducts()
{
    
            
            global $con;
            $select_query="SELECT * FROM `products`";
            $run_query=mysqli_query($con,$select_query);



            while($row_products=mysqli_fetch_array($run_query)){
                $product_id=$row_products['product_id'];
                $product_title=$row_products['product_title'];
                $product_brand=$row_products['product_brand'];
                $product_category=$row_products['product_cat'];
                $product_image=$row_products['product_image'];
                $product_price=$row_products['product_price'];
                $product_description=$row_products['product_desc'];
                $product_keywords=$row_products['product_keywords'];

                echo " 
                <div class=\"col-sm-4\">
                    <div class=\"panel panel-success\">
                                            <div class=\"panel-heading\">
                                                <div class=\"panel-title\" align='center'>
                                                    $product_title
                                                </div>

                                            </div>
                                            <div class=\"panel-body\" align=\"center\">
                                        
                                            <img src='images/$product_image' width=\"185\" height=\"225\" ><br>
                                            <br>
                                            
                                            <a href=\"details.php?pro_id=$product_id\" class=\"btn btn-info\">Details</a>
                                            <a href=\"index.php?pro_id=$product_id\" class=\"btn btn-warning\">Add to Cart</a>
                                            
                                            </div>
                                            <div class=\"panel-footer\">
                                                <span style=\"color:red\">Rs $product_price.00</span><br>
                                                <h6>$product_keywords</h6>
                                            </div>
                                                

                                            
                                            

                                            
                                        
                    
                    </div>
                </div>
                ";
                


            }


        

    
    
}





//Displaying All products
function searchProducts()
{
    
           if(isset($_GET['btn_search'])){ 
            global $con;
            $search_query=$_GET['search_text'];
            $select_query="SELECT * FROM `products` WHERE product_keywords LIKE '%$search_query%' ";
            $run_query=mysqli_query($con,$select_query);

            $count=mysqli_num_rows($run_query);
            if($count==0)
            {
                echo "<div class=\"alert alert-danger\" ><h3>There is no such a product available</h3></div>";
            }

            while($row_products=mysqli_fetch_array($run_query)){
                $product_id=$row_products['product_id'];
                $product_title=$row_products['product_title'];
                $product_brand=$row_products['product_brand'];
                $product_category=$row_products['product_cat'];
                $product_image=$row_products['product_image'];
                $product_price=$row_products['product_price'];
                $product_description=$row_products['product_desc'];
                $product_keywords=$row_products['product_keywords'];

                echo " 
                <div class=\"col-sm-4\">
                    <div class=\"panel panel-success\">
                                            <div class=\"panel-heading\">
                                                <div class=\"panel-title\" align='center'>
                                                    $product_title
                                                </div>

                                            </div>
                                            <div class=\"panel-body\" align=\"center\">
                                        
                                            <img src='images/$product_image' width=\"185\" height=\"225\" ><br>
                                            <br>
                                            
                                            <a href=\"details.php?pro_id=$product_id\" class=\"btn btn-info\">Details</a>
                                            <a href=\"index.php?pro_id=$product_id\" class=\"btn btn-warning\">Add to Cart</a>
                                            
                                            </div>
                                            <div class=\"panel-footer\">
                                                <span style=\"color:red\">Rs $product_price.00</span><br>
                                                <h6>$product_keywords</h6>
                                            </div>
                                                

                                            
                                            

                                            
                                        
                    
                    </div>
                </div>
                ";
                


            }


        

    
    

        
        
        
        }
    
}





?>