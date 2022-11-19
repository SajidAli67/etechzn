<?php require_once "include/header.php"; ?>
<?php require_once "class/getSetClass.php"; ?>
  <?php
 $getData =new GetData();
 $getDepositPlans =$getData->listOfItem('packages_term');
?>
   <section class="section section-lg text-center" id="pricing" data-type="anchor">
        <div class="container">
          <h3>Packages Plans</h3>
          <h4><span class="text-width-1">Check All the Packages plans what can make your future secure</span></h4>
          <div class="pricing-group-modern wow-outer">
            <!-- Pricing Modern-->
            <?php 
            foreach($getDepositPlans as $data){
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
          
            <article class="pricing-modern wow fadeInLeft">
              <h4 class="pricing-modern-title"><?php echo  $name?></h4>
              <table class="pricing-modern-table">
                <tr>
                  <td><?php echo $days?></td>
                  <td>Campaign Days</td>
                </tr>
                <tr>
                  <td><?php echo  $interest?> %</td>
                  <td>Deposit Interest</td>
                </tr>
                <tr>
                  <td><?php echo  $dailyAmount?>$</td>
                  <td>Per Day Earning</td>
                </tr>
                <tr>
                  <td><?php echo  $totalWithdraw?>$</td>
                  <td>Total Withdraw</td>
                </tr>
                <tr>
                  <td><?php echo  $refBounusLvl1?> $</td>
                  <td>Referral bonus</td>
                </tr>
              </table>
              <p class="pricing-modern-price"><span class="pricing-modern-price-currency">$</span><?php echo  $amount?></p><a class="button button-primary button-winona" href="login.php">Active Package</a>
            </article>
            <!-- Pricing Modern-->
            <?php   
          }

            ?>
            <!-- Pricing Modern-->
          </div>
        </div>
      </section>

</br>
</br>
</br>
<?php require_once "include/footer.php"; ?>