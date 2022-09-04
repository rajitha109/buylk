<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>buylk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Style_CSS/bootstrap.min.css">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	 <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	 <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Style_CSS/style.css">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <div class="panel panel-success">
                <div class="panel panel-heading"> Hello <?php echo $_SESSION['customer_email']?> </div>
                <div class="panel panel-body">
                    Your Payment was successfull.Please go to your account.!!!!<br>
                    <h4><a href="http://www.buylk.pay/customer/myaccount.php">Go to your account</a></h4>
                </div>

            </div>
            
        </div>
    </div>
</div>
    
</body>
</html>