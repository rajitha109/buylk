

<div class="table-responsive">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title" align="center">
                View All Products
            </div>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead align="center">
                    <tr class="danger"><th>SN</th> <th>Title</th> <th>Image</th> <th>Price</th>  <th>Edit</th> <th>Delete</th></tr>
                </thead>
                <tbody>
                <?php
                global $con;
                $select="SELECT * FROM `products` ";
                $run_select=mysqli_query($con,$select);
                while ($row=mysqli_fetch_array($run_select)) {
                    $sn=$row['product_id'];
                    $title=$row['product_title'];
                    $image=$row['product_image'];
                    $price=$row['product_price'];



                    # code...
                ?>
                <tr> <td><?php echo $sn ?></td> <td><?php echo $title ?></td> <td><img src="../images/<?php echo $image?>" alt="" width="50" height="50"></td>  <td>Rs <?php echo $price ?>.00</td> <td><a href="index.php?edit=<?php echo $sn;?>" class="btn btn-success">Edit</a></td>  <td><a href="index.php?remove=<?php echo $sn;?>" class="btn btn-danger">Remove</a></td> </tr>
                <?php
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>

</div>