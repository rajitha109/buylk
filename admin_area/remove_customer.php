<?php
$id=$_GET['remove_customer'];
$_SESSION['customer_email_remove']=$id;
?>



      <div class="col-sm-5">
            <div class="panel panel-danger">

                <div class="panel panel-heading">
                    <div class="panel-title" align="center">Do you really want to DELETE ??</div>
                </div>
                <div class="panel-body">
                    <form action="index.php" method="post" role="form">
                        
                       
                        
                        <div class="form-group">
                            
                            <input type="submit" name="cus_yes"  class="btn btn-danger btn-lg btn-block" value="Yes">
                        </div>
                        <div class="form-group">
                            
                            <input type="submit" name="cus_no"  class="btn btn-success btn-lg btn-block" value="No">
                        </div>

                    </form>


                </div>

            </div>    

        </div>