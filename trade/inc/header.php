<?php require_once "../class/core.php"; ?>
<?php require_once "../class/getSetClass.php"; ?>
  <?php
  $id = $_SESSION['aId'];
 $getData =new GetData();
 $getAdminUser =$getData->specificItem('tbl_admin','aId',$id);

foreach ($getAdminUser as $data) {
  $uId = $data['user_id'];
  $agentId =$data['agent_id'];
}
if($uId!=0) {
  $getUserInfo = $getData->specificItem('tbl_member','mId',$uId);
foreach($getUserInfo as $data){
    $uname = $data['member_name'];
  }
}
elseif ($agentId!=0 AND $uId==0 ) {
  $getAgentInfo = $getData->specificItem('tbl_agent','id',$agentId);
foreach($getAgentInfo as $data){
    $uname = $data['name'];
  }
}
else{
  $name ="HR ADMINS";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CoinBet</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css?version=51">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
   
<?php if($_SESSION['admin']['role'] == "agent"):?>
 
   <?php include "header-agent.php"; ?>
<?php endif ?>
<?php if($_SESSION['admin']['role'] == "user"):?>
   <?php include "header-user.php"; ?>
<?php endif ?>
<?php if($_SESSION['admin']['role'] == "admins"):?>
   <?php include "header-admins.php"; ?>
<?php endif ?>

        