

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
                    <tr class="danger"><th>SN</th> <th>Name</th> <th>Email</th> <th>Delete</th></tr>
                </thead>
                <tbody>
                <?php
                global $con;
                $select="SELECT * FROM `customers` ";
                $run_select=mysqli_query($con,$select);
                while ($row=mysqli_fetch_array($run_select)) {
                    $sn=$row['customer_id'];
                    $name=$row['customer_name'];
                    $email=$row['customer_email'];
                    


                    # code...
                ?>
                <tr> <td><?php echo $sn ?></td> <td><?php echo $name ?></td> <td><?php echo $email ?></td> <td><a href="index.php?remove_customer=<?php echo $email;?>" class="btn btn-success">Remove</a></td>   </tr>
                <?php
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>

</div>