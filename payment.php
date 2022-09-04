<?php

$con=mysqli_connect("localhost","root","","ecommerce");
$total=0;
global $con;
$ip=getRealIpAddr();
$sel_price="SELECT * FROM cart WHERE `ip_add`='$ip' ";
$run_price=mysqli_query($con,$sel_price);
while($row_price=mysqli_fetch_array($run_price))
{
    $p_id=$row_price['p_id'];
    $product_price="SELECT * FROM `products` WHERE `product_id`='$p_id'";
    $run_product_price=mysqli_query($con,$product_price);
    while($row_quantity=mysqli_fetch_array($run_product_price))
    {
        $product_price=array($row_quantity['product_price']);
        $value=array_sum($product_price);
        $total+=$value;
        $product_title=$row_quantity['product_title'];

    }


}



?>

<div class="panel panel-success col-sm-6">
    <div class="panel-heading">
        <div class="panel-title" align="center">
            Pay with Paypal
        </div>
    </div>
    <div class="panel-body" align="center"><form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="rajithatest@gmail.com">

        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">

        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $product_title;?>">
        <input type="hidden" name="amount" value="<?php echo $product_price; ?>">
        <input type="hidden" name="currency_code" value="LKR">

        <input type="hidden" name="return" value="http://www.buylk.pay/pay_success.php" >
        <input type="hidden" name="return_cancel" value="http://www.buylk.pay/pay_cancel.php" >
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0"
        src="images/pay_btn.png"
        alt="Buy Now">
        <img alt="" border="0" width="1" height="1"
        src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

        </form>
    </div>

</div>