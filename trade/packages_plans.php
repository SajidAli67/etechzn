<?php require_once "inc/header.php"; ?>
  <?php
 $getData =new GetData();
 $getDepositPlans =$getData->listOfItem('packages_term');
?>
<div class="main-panel">
          <div class="content-wrapper">

            <div class="row">
              <div id="msg" class="text-success"></div>
          <?php 
            foreach($getDepositPlans as $data){
              $id = $data["id"];
              $name = $data['terms_name'];
              $amount= $data['amount'];
              $days   =$data['days'];
              $interest = $data['daily_percentage'];

              $withdrawamount = ($amount*$interest)/100;
             $totalWithdraw = $withdrawamount+$amount;
              $dailyAmount = $totalWithdraw/$days ;
             $dailyAmount =number_format($dailyAmount, 2);
             $refBounusLvl1=($amount*5)/100;
              ?>
              <div class="col-xl-4 col-sm-6 grid-margin stretch-card" id="packagesDetails" style="display: block;">
                <div class="card" align="center">
                  <div class="card-body">
                    <h4 class="pricing-modern-title"><?php echo  $name?></h4>
                    <h4><?php echo  $amount ;?> $</h4>
              <table class="table" cellspacing="center">
                <tr>
                  <td><?php echo $days?></td>
                  <td>Campaign Days</td>
                </tr>
                <tr>
                  <td><?php echo  $interest?> %</td>
                  <td>Package Interest</td>
                </tr>
                <tr>
                  <td><?php echo  $dailyAmount?>$</td>
                  <td>Per Day Earning</td>
                </tr>
                <tr>
                  <td><?php echo  $totalWithdraw?>$</td>
                  <td>Total Earning</td>
                </tr>
                <tr>
                  <td><?php echo  $refBounusLvl1?> $</td>
                  <td>Referral bonus</td>
                </tr>
              </table>
                  </div>
                  <button class="btn btn-danger activePackage" id="activePackage" data-toggle="modal" data-target="#myModal" data-attr="<?php echo $id; ?>">Press to Activate</button>
                </div>
                <!-- Information card end -->


              </div>
          

                   <?php   
          }

            ?>
             </div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Activate Package</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body btn-danger">
        <form id="packageConfirmForm">
          <input type="hidden" name="packId" id="packId">
        </form>
        <h6>Are you Sure that You want to activate this package? Then Press Confirm to activate this package</h6>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" align="center">
        <button type="button" id="confirmPakage" class="btn btn-danger" data-dismiss="modal">Press Confirm</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<?php require_once "inc/footer.php"; ?>
<script src="custom-js/packages.js"></script>