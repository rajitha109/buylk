<?php

if(isset($_GET['edit_account']))
{
    global $con;
    $email=$_SESSION['customer_email'];
    $select="SELECT * FROM `customers` WHERE `customer_email`='$email' ";
    $run_select=mysqli_query($con,$select);
    $row=mysqli_fetch_array($run_select);
        
    $fname=$row['customer_name'];
    $add=$row['customer_Address'];
    $postal=$row['customer_postal'];
    $contact=$row['customer_contact'];
        
}

?>

 <div class="col-sm-5">
                            
                            <div class="panel panel-warning">

                                <div class="panel panel-heading">
                                    <div class="panel-title" align="center">Edit Account</div>
                                </div>
                                <div class="panel-body">
                                    <form action="myaccount.php" method="post" role="form">
                                        <div class="form-group">
                                            <label for="fname">Full Name :</label>
                                            <input type="text" name="fname" placeholder="Enter your full name" class="form-control" value="<?php echo $fname;?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email :</label>
                                            <input type="email" name="email_r" placeholder="Enter your email" class="form-control" value="<?php echo $email;?>" required>
                                        </div>   

                                        <div class="form-group">
                                            <label for="addre">Shipping Address :</label>
                                            <input type="text" name="address" placeholder="Enter your address" class="form-control"  height="10" value="<?php echo $add;?>"  required>
                                        </div>    

                                        <div class="form-group">
                                            <label for="postal">Postal Code :</label>
                                            <input type="text" name="postal" placeholder="Enter your postal code" class="form-control"  value="<?php echo $postal;?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact">Contact No :</label>
                                            <input type="text" name="contact" placeholder="Enter your contact number" class="form-control"  value="<?php echo $contact;?>"  required>
                                        </div>

                                       
                                        
                                        


                                        <div class="form-group">
                                            
                                            <input type="submit" name="update"  class="btn btn-success btn-lg btn-block" value="Update Account">
                                        </div>

                                    </form>

                                </div>

                            
                            </div>
                        
                    </div> 