<?php require_once "include/header.php"; ?>
<section class="section-lg">
<div class="main-grid" align="center" style="margin-top:50px ">
    <div class="col-md-5 col-md-offset-4" >
    <form id="userRegi" method="post" action="action/user.php">
        <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Full Name</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="fname" required>
                </div>
        <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Username</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="username" required>
                </div>
        <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="email" required>
                </div>
        <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Password</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="password" required>
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Confirm Password</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="conPassword" required>
                </div>
        <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Reference ID</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="reffid">
                </div>

                <div class="form-group text-danger">
                    <button type="submit" class="btn btn-primary btn-lg" name="loginForm">Active Account</button>
                </div>
        
    </form>
</div>
</div>
</section>




<?php require_once "include/footer.php"; ?>