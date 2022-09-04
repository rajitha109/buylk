

<div class="table-responsive">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title" align="center">
                View All Brands
            </div>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead align="center">
                    <tr class="danger"><th>SN</th> <th>Title</th> <th>Edit</th> <th>Delete</th></tr>
                </thead>
                <tbody>
                <?php
                global $con;
                $select="SELECT * FROM `brands` ";
                $run_select=mysqli_query($con,$select);
                while ($row=mysqli_fetch_array($run_select)) {
                    $sn=$row['brand_id'];
                    $title=$row['brand_title'];
                    


                    # code...
                ?>
                <tr> <td><?php echo $sn ?></td> <td><?php echo $title ?></td> <td><a href="index.php?bra_edit=<?php echo $sn;?>" class="btn btn-success">Edit</a></td>  <td><a href="index.php?bra_remove=<?php echo $sn;?>" class="btn btn-danger">Remove</a></td> </tr>
                <?php
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>

</div>