<?php
global $con;
$id=$_GET['edit'];

$_SESSION['edit_id']=$id;

$select="SELECT * FROM `products` WHERE `product_id` ='$id' ";
$run_select=mysqli_query($con,$select);
$row=mysqli_fetch_array($run_select);
$p_id=['product_id'];
$title=$row['product_title'];
$image=$row['product_image'];
$price=$row['product_price'];
$keywords=$row['product_keywords'];
$description=$row['product_desc'];
$cat=$row['product_cat'];
$bid=$row['product_brand'];

/*load brand in option*/
$select_brand_t="SELECT * from `brands` where `brand_id`='$bid'";
$run_select_brand_t=mysqli_query($con,$select_brand_t);
$row_brand_t=mysqli_fetch_array($run_select_brand_t);
$brand_title=$row_brand_t['brand_title'];
/*load category in option*/
$select_cat_t="SELECT * from `categories` where `cat_id`='$cat'";
$run_select_cat_t=mysqli_query($con,$select_cat_t);
$row_cat_t=mysqli_fetch_array($run_select_cat_t);
$cat_title=$row_cat_t['cat_title'];






?>

 <div >
                <div class="panel panel-primary">
                    <div class="panel-heading" align="center" >
                        <div class="panel-title" required>
                            Edit a Product
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="index.php" method="post" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="product_title">Product Title:</label>
                                <input type="text" name="product_title" class="form-control" id="product_title" value=<?php echo $title;?> required>
                            </div>

                            <div class="form-group">
                                <label for="product_category">Product Category:</label>
                                <select name="product_category" id="" class="form-control" required>
                                <option><?php echo $cat_title;?></option>
                                <?php
                                getcats();

                                ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_brand">Product Brand:</label>
                                <select name="product_brand" id="" class="form-control" required>
                                <option><?php echo $brand_title;?></option>
                                <?php
                                getbrand();

                                ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_image">Product Image:</label>
                                <input type="file" name="product_image" class="form-control file" id="product_image"  required>
                                <img src="../images/<?php echo $image; ?>" alt="" width="50" height="50">
                            </div>

                            <div class="form-group">
                                <label for="product_price">Product Price:</label>
                                <input type="text" name="product_price" class="form-control" id="product_price" value=<?php echo $price; ?> required>
                            </div>

                            <div class="form-group">
                                <label for="product_keywords">Product Keywords:</label>
                                <input type="text" name="product_keywords" class="form-control" id="product_keywords" value=<?php echo $keywords; ?> required> 
                            </div>

                            <div class="form-group">
                                <label for="product_description">Product Description:</label>
                                <textarea name="product_description" id="" cols="20" rows="10" class="form-control" required><?php echo $description; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary" align="center" name="update_product" required>Update</button>

                        </form>
                        </div>
                </div>
            </div>