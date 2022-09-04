<?php 
include 'includes/connection.php';


?>


<!-- Navigation tabs -->
<div class="col-sm-10">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active" >
            <a href="#login" data-toggle="tab" class="btn btn-warning">
            Login
            </a>

        </li>
       <li>
            <a href="customer_registration.php"  class="btn btn-warning">
            Register
            </a>
        </li>

    </ul>


</div>
    
<!-- tab contents -->
<div  id="myTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="login">
        <div class="col-sm-5">
            <div class="panel panel-warning">

                <div class="panel panel-heading">
                    <div class="panel-title" align="center">Login</div>
                </div>
                <div class="panel-body">
                    <form action="checkout.php" method="post" role="form">
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" name="email_lg" placeholder="Enter your email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="pwd">Password :</label>
                            <input type="password" name="pwd_lg" placeholder="Enter your password" class="form-control">
                        </div>
                        <a href="checkout.php?forgot_pass">Forgot Password</a>
                        <div class="form-group">
                            
                            <input type="submit" name="login"  class="btn btn-success btn-lg btn-block" value="Login">
                        </div>

                    </form>
                    <?php
                    if(isset($_POST['login']))
                    {
                        
                        $Uemail=$_POST['email_lg'];
                        $Upass=$_POST['pwd_lg'];
                        $select_customer="SELECT * FROM `customers` WHERE `customer_email`='$Uemail' AND `customer_pass`='$Upass' ";
                        $run_select_customer=mysqli_query($con,$select_customer);
                        $check_customer=mysqli_num_rows($run_select_customer);


                        
                        //check whether the email is available and check password matched or not
                        $select_customer_email="SELECT * FROM `customers` WHERE `customer_email`='$Uemail'";
                        $run_select_customer_email=mysqli_query($con,$select_customer_email);
                        $row=mysqli_fetch_array($run_select_customer_email);
                        $pass=$row['customer_pass'];
                        

                        


                        if($row)
                        {
                            if($pass != $Upass)
                            {
                                echo "<div class=\"alert alert-danger\" data-dismiss=\"alert\" aria-label=\"close\"> Incorrect password &times;</div>";
                            }
                            else
                            {
                                
                                
                                if($check_customer>0 /*AND $check_cart==0*/)
                                {
                                    $_SESSION['customer_email']=$Uemail;
                                    echo "<script>alert('You have successfully logged in');</script>";
                                    echo "<script>window.open('index.php','_self')</script>";
                                }
                               
                                        
                            }

                        }
                        else
                        {

                        
                            if($check_customer==0 && !$row)
                            {
                                echo "<div class=\"alert alert-danger\" data-dismiss=\"alert\" aria-label=\"close\"> You have not registered,Please register before login &times;</div>";
                        
                            }
                        }

                        
                        $ip_add=getRealIpAddr();
                        $query="SELECT * FROM cart WHERE `ip_add`='$ip_add'";
                        $run_query=mysqli_query($con,$query);
                        $check_cart=mysqli_num_rows($run_query);
                        

                        
                        /*else
                        {
                            
				            
				            echo "<script>window.open('checkout.php','_self')</script>";
                        }*/
                        

                    }
                    
                    ?>

                </div>

            </div>    

        </div>
        <!-- $run_select_customer=mysqli_query($con,$select_customer);
                        $check_customer=mysqli_num_rows($run_select_customer);</div> -->

 <!--   <div class="tab-pane fade" id="register">
 -->
 </div>



     <script> $(function () { $('#myTab li:eq(1) a').tab('show'); }); </script>

