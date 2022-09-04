


      <div class="col-sm-5">
            <div class="panel panel-warning">

                <div class="panel panel-heading">
                    <div class="panel-title" align="center">Login</div>
                </div>
                <div class="panel-body">
                    <form action="myaccount.php" method="post" role="form">
                        <div class="form-group">
                            <label for="current_pwd">Current Password :</label>
                            <input type="password" name="current_pwd" placeholder="Enter your current password" class="form-control" required>
                        </div>

                         <div class="form-group">
                            <label for="new_pwd">New Password :</label>
                            <input type="password" name="new_pwd" placeholder="Enter your new password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="new_pwd_re">Re-type New Password :</label>
                            <input type="password" name="re_new_pwd" placeholder="Re-enter your new password" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            
                            <input type="submit" name="change_pwd"  class="btn btn-success btn-lg btn-block" value="Change Password">
                        </div>

                    </form>


                </div>

            </div>    

        </div>