<?php require_once "include/header.php"; ?>
<?php require_once "class/loginheader.php";?>
<div class="main-grid" align="center" style="margin-top:50px ">
  <div class="col-md-5 col-md-offset-4" >
           <div class="card-header mx-auto bg-dark">
            
                        <span class="logo_title mt-5 text-white"> Login Dashboard </span>
         <h4 class="text-danger"><?php if(isset($msg)){echo "{$msg}";}?></h4>

        </div>
        <br>
      <div class="card text-center">
        <span> <!-- <img src="images/<?php echo $logo;?> -->" height="50px" width="50"> </span>
        <div class="card" align="center">
            <form action="" method="post">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Username</span>
                    </div>
                    <input type="text" class="form-control" placeholder="" name="username">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Password</span>
                    </div>
                    <input type="password" class="form-control" placeholder="" name="password">
                </div>


                <div class="form-group text-danger">
                    <button type="submit" class="btn btn-primary btn-lg" name="loginForm">Log In</button> OR 
                    <a class="btn btn-primary" href="register.php">Sign Up</a>
                </div>

            </form>
        </div>
    </div>
    <br>
     <div class="card-header mx-auto bg-dark">

        </div>
 
</div>





<?php require_once "include/footer.php"; ?>