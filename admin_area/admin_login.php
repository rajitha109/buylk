<?php
session_start();
############## Start Session before assign $_SESSION['']##########################
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../Style_CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	 <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	 <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../Style_CSS/style.css">
    
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" >
                <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title" align="center">
                            Admin Login
                        </div>
                    </div>
                        <div class="panel-body">
                        <form method="post" action="admin_login.php" role="form">
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" name="admin_email" placeholder="Enter your email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="pwd">Password :</label>
                                <input type="password" name="admin_pwd" placeholder="Enter your password" class="form-control" required>
                            </div>
                                    <button type="submit" name="login" class="btn btn-warning btn-block btn-lg">Login</button>
                            </form>
                        
                        
                        </div>
                        <?php

                require  'functions.php';
                ####################### Admin Logging ########################
                
                if(isset($_POST['login']))
                {
                    $email=$_POST['admin_email'];
                    $pass=$_POST['admin_pwd'];
                    
                    $select="SELECT * FROM `admin` WHERE `admin_email`='$email' AND `admin_pass`='$pass'";
                    $run=mysqli_query($con,$select);
                    $check=mysqli_num_rows($run);
                    
                    
                    
                    
                    if($check==1)
                    {
                        ##################### Set Session ########################
                        
                        $_SESSION['adminEmail']=$email;
                        echo"<script>window.open('index.php?logged_in=You Have Successfully logged in!','_self');</script>";                   
                        


                    }
                    
                    else
                    {
                        
                       
                        echo"<script>alert('Incorrect email or password!')</script>";

                        
                        
                        
                    }
                    
                }
                

                
                ?>

                 
                 
<!-- Check whether logged out or admin or not -->

                <?php 
                if(isset($_GET['logged_out']))
                {
                    $logout=$_GET['logged_out'];
                    echo "<div class=\"alert alert-warning\"><h5 align=\"center\">$logout</h5></div>";
                }
                
                if(isset($_GET['not_admin']))
                {
                    $not=$_GET['not_admin'];
                    echo "<div class=\"alert alert-warning\"><h5 align=\"center\">$not</h5></div>";
                }
                
                
                
                ?>

    
 


                        
                    
                
                </div>
            </div>
            <div class="col-sm-3"></div>          
            
            

        </div>
    </div>







    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="https://code.jquery.com/jquery.js"></script>
	 <!-- Include all compiled plugins (below), or include individual files as needed --> 
	 <script src="../js/bootstrap.min.js"></script>

     
</body>
</html>