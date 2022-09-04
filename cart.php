<?php require 'functions/functions.php'; 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="Style_CSS/bootstrap.min.css">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	 <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	 <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Style_CSS/style.css">
	<title>buylk</title>
</head>
<body>
	<!--Navigation bar Start here -->
	<nav class="navbar navbar-inverse navbar-static-top" id="mynav">
		<div class="container">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse
			" >
				<span class="sr-only">Toogle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a  href="index.php" class="navbar-brand">buylk</a>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right " >
					<li class="active"><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
					<li><a href="all_products.php"><i class="fab fa-product-hunt"></i> All Products</a></li>
				<li> <a href="customer/myaccount.php"><i class="fas fa-user"></i> My account</a></li>
				<li> <a href="customer_registration.php"><i class="fas fa-sign-in-alt"></i> Sign Up</a></li>
				<li> <a href="cart.php"><i class="fas fa-cart-arrow-down"></i> My Cart <?php totalitems(); ?> <?php getTotalPrice() ?></a></li>
				<li> <a href="contact_us.php"><i class="fas fa-phone"></i> Contact Us</a></li>
				<li> <a data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i> Search</a></li>
				<?php
					if(!isset($_SESSION['customer_email']))
					{echo "<li><a href=\"checkout.php\">Login</a></li>";}
					else{echo "<li ><a href=\"logout.php\">Logout</a></li>";}
				?>
					
				</ul>
				
			</div>
							
		</div>
		
	</nav>
	<?php getRealIpAddr(); ?>
	<!-- Navigation bar ends here -->

	<!-- Dialog Box with form starts here -->
	<div id="myModal" class="modal fade" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title">Search <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
				</div>
				<div class="modal-body">
				<!-- form for search -->
						
					<form class="modal-body" role="form" method="get" action="search.php" enctype="multipart/form-data">
						<div class="form-group">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="search_text" placeholder="Type to search">
							</div>
							<div class="col-sm-2">
								<button type="submit" class="btn btn-primary" name="btn_search"><i class="fas fa-search"></i></button>
							</div>
						</div>			
																
					</form><!-- form search ends-->
							
				</div><!-- 
				<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div> -->
			</div>
		</div>
	</div>
	<!-- Dialog Box with form ends here -->



	<!-- Side bar and Main contents start here -->
	
	<div class="container-fluid">
		<div class="row">
		<!-- side bar start-->
			<div class="col-sm-2"  >
			<!-- side bar categories -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-primary" >
							<div class="panel-heading" id="sidebar">
								<div class="panel-title" align="center" >
								Categories
								</div>
								
							
							</div>
							<div class="panel-body">
								<?php getcats();?>
							</div>	 

						
						
						
						</div >
				
					</div>
				</div>

				<!-- side bar brands -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-primary" >
							<div class="panel-heading" id="sidebar">
								<div class="panel-title" align="center" >
								Brands
								</div>
													
							</div>
							<div class="panel-body">
							<?php getbrand(); ?>


							</div>	 

						</div >
					</div>
					
					
					

				</div>

			</div>
			<!-- Main area -->
			<div class="col-sm-10">
				
					<div class="row">
						<!-- Form  -->
							<form role="form" method="post" enctype="multipart/form-data">

                            <div class="table-responsive col-sm-10">
                                <table class="table ">
                                     
                                     <thead align="center">
                                        
                                        <tr class="danger"><th align="center"> Select</th> <th> Product(S)</th> <th> Quantity</th> <th>  Price</th></tr>
                                     </thead>

                                     <tbody align="center"> 
                                                                                                   
                                     
                                        <?php 
                                        $total=0;
                                        global $con;
                                        $ip=getRealIpAddr();
                                        $sel_price="SELECT * FROM cart WHERE `ip_add`='$ip' ";
                                        $run_price=mysqli_query($con,$sel_price);
                                        while($row_price=mysqli_fetch_array($run_price))
                                        {
											$p_id=$row_price['p_id'];
											$qty=$row_price['qty'];
                                            
                                            
                                            $product_price="SELECT * FROM `products` WHERE `product_id`='$p_id'";
                                            
                                            $run_product_price=mysqli_query($con,$product_price);
                                            while($row_quantity=mysqli_fetch_array($run_product_price))
                                            {
                                                $product_price=array($row_quantity['product_price']*$qty);
                                                $product_title=$row_quantity['product_title'];
                                                $single_price=$row_quantity['product_price'];
                                                $value=array_sum($product_price);
                                                $total+=$value;
                                                             
                                        ?>                                 
										<!-- Data inside the cart while loop -->									
                                            
                                            <tr>
                                                <td> 
                                                                                      
                                                	<input type="checkbox" name="remove[]" value="<?php echo $p_id?>">
                                                    
                                                </td>
                                                <td>    
                                                    <?php echo $product_title?>
                                                </td>
                                                <td>    
                                                    <div class='input-group col-sm-2'>                                                        
                                                        <input type='number' name='qty_input' class='form-control'  value="<?php  echo $qty;?>"> 
														
                                                    </div>
													<?php
													if(isset($_POST['update']))
													{	
														$qty_in=$_POST['qty_input'];
														$update="UPDATE `cart` SET `qty`='$qty_in'";														
														$run_update_query=mysqli_query($con,$update);
														$_SESSION['qty']=$qty_in;
														echo"<script>window.open('cart.php','_self')</script>";
																	//echo "<div class=\"alert alert-danger\">Please Select an Item</div>";
													}
													?>	
                                                </td>
                                                 <td>
                                                    <?php echo 'Rs ',$single_price,'.00' ?>
                                                 </td>
                                            </tr>
                                            <?php }};?>
										
											

                                                                                
                                     <tr > <td colspan="5" align="center"><label  class="badge " >Total Price: <?php echo "Rs $total.00 ";?></label></td></tr>                         
                                     <tr class="success"><td><button type="submit" name="update" id="" class="btn btn-info"> <i class="fas fa-cart-arrow-down"></i> Update Cart </button></td> <td><button type="submit" name="remove_cart" id="" class="btn btn-danger"> <i class="fas fa-cart-arrow-down"></i> Remove</button></td> <td><button name="continue" id="" class="btn btn-warning"> <i class="fas fa-cart-arrow-down"></i> Continue Shopping </button></td>   <td><a href="checkout.php" name="checkout" id="" class="btn btn-success"> <i class="fas fa-cart-arrow-down"></i> Checkout </a></td> <td></td>    </tr>
                                    

									 
									 
									 </tbody>
                                </table>
                                    
                            </div>
                            </form>


                            <?php

							
								//Remove Checked Items
								global $con;
								$ip=getRealIpAddr();
								if(isset($_POST['remove_cart']))
								{
									if(isset($_POST['remove']))
									{
										foreach ($_POST['remove'] as $remove_id) {
											# code...
											$delete_product="DELETE FROM `cart` WHERE `p_id`='$remove_id' AND `ip_add`='$ip' ";
											$run_delete=mysqli_query($con,$delete_product);
											if($run_delete)
												{
													echo "<script>window.open('cart.php','_self')</script>";

												}

										}
									}

									
								} 
								
								else if(isset($_POST['continue']))
								{
									echo "<script>window.open('index.php','_self')</script>";
								}

								else if(isset($_POST['update']))
													{
														$update="UPDATE `cart` SET `qty`='$qty_in' WHERE `p_id`='$remove_id' ";
																	$run_update_query=mysqli_query($con,$update);
																	echo "<div class=\"alert alert-danger\">Please Select an Item</div>";
														
														/*if(isset($_POST['remove']))
														{	
															foreach ($_POST['remove'] as $remove_id) 
															{	
																foreach($_POST['qty_input'] as $qty_in)
																{
																	$update="UPDATE `cart` SET `qty`='$qty_in' WHERE `p_id`='$remove_id' ";
																	$run_update_query=mysqli_query($con,$update);


																}
																																
																
																		
																//$_SESSION['qty']=$qty;//keep qty that is entered by the user
																			
																
																

																	
																					
															}
														}*/

														/*else
														{
															echo "<div class=\"alert alert-danger\">Please Select an Item</div>";

														}*/
														
													}

												

													
									
													

								


							?>
							
													
							
												
						
						</div>
						
					</div>

			
			

			</div>



			

			


			

		</div>

	</div>


		
	

<!-- Footer starts -->
	<footer class="navbar navbar-inverse navbar-fixed-bottom" >
		<div class="container">
			
				
					<div class="row">
						<div class="col-sm-4 navbar-text pull-left">
							<h6>copyright  &copy;2018 www.buylk.free </h6>
						</div>		

						<div class="col-sm-4 navbar-text pull-right ">
							<p class="navbar-text">Join With Us:</p>
							
							<a href="#" id="fb"><i class="fab fa-facebook-square fa-3x"></i></a>
							<a href="#" id="tw"><i class="fab fa-twitter-square fa-3x"></i></a>
							<a href="#" id="gp"><i class="fab fa-google-plus-square fa-3x"></i></a>
						</div>


					</div>

					
		
		</div>
	<footer>
<!-- Footer Ends -->
		
	






	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="https://code.jquery.com/jquery.js"></script>
	 <!-- Include all compiled plugins (below), or include individual files as needed --> 
	 <script src="js/bootstrap.min.js"></script>
     


</body>
</html>