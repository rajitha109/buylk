<?php
global $con;
$bra_id=$_GET['bra_edit'];

$_SESSION['bra_edit_id']=$bra_id;

$select="SELECT * FROM `brands` WHERE `brand_id` ='$bra_id' ";
$run_select=mysqli_query($con,$select);
$row_select=mysqli_fetch_array($run_select);
$p_bra_id=$row_select['brand_id'];
$brand_title=$row_select['brand_title'];





?>

 <div>
                <div class="panel panel-primary">
                    <div class="panel-heading" align="center" >
                        <div class="panel-title" required>
                            Edit a Brand
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="index.php" method="post" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="brand_title">Brand Title:</label>
                                <input type="text" name="brand_title" class="form-control"  value=<?php echo $brand_title;?>>
                            </div>

                            <button type="submit" class="btn btn-primary" align="center" name="update_brand" required>Update</button>

                        </form>
                        </div>
                </div>
            </div>