<?php
ob_start();
session_start();
include("db.php");
$msg = '';

//if admin login this site then autometically redirect index.php
if(!empty($_SESSION['admin'])){
  if($_SESSION['aId'] == true){
    header("location: trade/dash.php");
  }
}

  //admin login
 if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['loginForm'])){
  
  if(empty($_POST["username"]) || empty($_POST["password"]))
  {
    $msg .= "<div id='login_error'> <strong>Error</strong>: Both field can't be empty!!</div>";
  }
  else
  {
    
    $sql = $pdo->prepare("SELECT * FROM tbl_admin WHERE username = ? or email = ?"); 
    $sql->execute(array($_POST["username"],$_POST["username"]));
    $result = $sql->fetchAll();
    $total = $sql->rowCount();
    
    if($total==0)
    {
      $msg .= "<div id='login_error'> <strong>Error</strong>: Username Address does not match!!</div>";
    }
    else
    {   
      foreach($result as $row)
      { 
       
        $check_password = hash('sha256',$_POST["password"] .$row['salt']); 
        for($round = 0; $round < 65536; $round++) 
        { 
          $check_password = hash('sha256', $check_password.$row['salt']); 
        }
      
        $row_password = $row['password'];
        $prov = $row['approved'];
      
      }

      if($check_password != $row_password)
      {
        $msg .= "<div id='login_error'> <strong>Error</strong>: Invalid username or Password. <a href='forgot-password.php'>Lost your password?</a></div>";
      }elseif($prov==0){
        $msg .= "<div id='login_error'> <strong>Error</strong>:  Your account is not approved</a></div>";

      }
      else
      {   
        
        $_SESSION['admin']         = $row;
        $_SESSION['aId']           = $_SESSION['admin']['aId'];
        $_SESSION['user_id']       = $_SESSION['admin']['user_id'];
        $_SESSION['username']      = $_SESSION['admin']['username'];
        $_SESSION['email']         = $_SESSION['admin']['email'];
        $_SESSION['mobile']        = $_SESSION['admin']['mobile'];
        $_SESSION['fullName']      = $_SESSION['admin']['fullName'];
        $_SESSION['verify_status'] = $_SESSION['admin']['verify_status'];
        $_SESSION['role']          = $_SESSION['admin']['role'];
        $_SESSION['status']        = $_SESSION['admin']['status'];
        $_SESSION['note']          = $_SESSION['admin']['note'];
        $_SESSION['branch_id']     = $_SESSION['admin']['branch_id'];
        
        if($_SESSION['status'] == 3){
          $msg .= "<div id='login_error'> <strong>Error : !!!</strong>  You are permamently sunpended  </div>";
        }
        if($_SESSION['verify_status'] == "N"){
          $msg .= "<div id='login_error'> <strong>Error : !!!</strong>  Please verify your email  </div>";
        }else{
          //update tbl_admin forgotPasswordCode field will be empty
            $sql = $pdo->prepare("update tbl_admin set forgotPasswordCode=? WHERE username = ? or email = ?");
          $sql->execute(array("",$_POST["username"],$_POST["username"]));

          header("location: trade/dash.php");
        }
        
      }
    }
  }
}
?>
<?php
  // Saving data into the main table tbl_customization
  $sql   = $pdo->prepare("SELECT * FROM tbl_customization where cId=?");
  $sql->execute(array(1));
  $result = $sql->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row){
       $logo       = $row["logo"];
  }
  // Saving data into the main table tbl_generalsettings
  $sql   = $pdo->prepare("SELECT * FROM tbl_generalsettings where GId=?");
  $sql->execute(array(1));
  $result = $sql->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row){
       $siteTitle       = $row["siteTitle"];
  }
?>


