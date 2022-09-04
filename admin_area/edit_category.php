<?php
global $con;
$cat_id=$_GET['cat_edit'];

$_SESSION['cat_edit_id']=$cat_id;

$select="SELECT * FROM `categories` WHERE `cat_id` ='$cat_id' ";
$run_select=mysqli_query($con,$select);
$row_select=mysqli_fetch_array($run_select);
$p_cat_id=$row_select['cat_id'];
$cat_title=$row_select['cat_title'];





?>

 <div>
                <div class="panel panel-primary">
                    <div class="panel-heading" align="center" >
                        <div class="panel-title" required>
                            Edit a Category
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="index.php" method="post" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="product_title">Category Title:</label>
                                <input type="text" name="category_title" class="form-control"  value=<?php echo $cat_title;?>>
                            </div>

                            <button type="submit" class="btn btn-primary" align="center" name="update_cat" required>Update</button>

                        </form>
                        </div>
                </div>
            </div>