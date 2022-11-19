<?php require_once "inc/header.php"; 
if($_SESSION['admin']['role'] == "user"):?>
  <?php
 $getData =new GetData();

 $getData->timeZone();
 $userId = $getData->getUserId();
 $getActivePackages = $getData->specificItem('tbl_packages', 'user_id', $userId);

?>
<div class="main-panel">
          <div class="content-wrapper">
              <div class="row">


             <?php
             $i =0;
    foreach($getActivePackages as $data){
      
        $i++;
         
    $status= $data['status'];
    $pack_term=$data['pack_term'];
    $packId =$data['id'];
    $interval_time =$data['interval_time'];
    $splitTimeStamp = explode(" ",$interval_time);
    $date = $splitTimeStamp[0];
    $time = $splitTimeStamp[1];
    $getPackageTerm = $getData->specificItem('packages_term', 'id', $pack_term);
    foreach($getPackageTerm as $row){
    $amount= $row['amount'];
    $days   =$row['days'];
    $interest = $row['daily_percentage'];
    $withdrawamount = ($amount*$interest)/100;
    $totalWithdraw = $withdrawamount+$amount;
    $dailyAmount = $totalWithdraw/$days ;
    $dailyAmount =number_format($dailyAmount, 2);
    }
    $data = strtotime($date);
    $getDate = date(" Y, F, d", $data);
         ?>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5><?php echo $row['terms_name'];?></h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo $row['amount'];?>$</h2>
                          <p class="text-danger ms-2 mb-0 font-weight-medium">Package Plan</p>
                        </div>
                        <h6 class="text-muted font-weight-normal"><?php echo $dailyAmount; ?>$ Daily Earning</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <p class="font-weight-normal" id="counter"></p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
   <script>
    var countDownDate = new Date("<?php echo "$getDate $time"; ?>").getTime();
    // Update the count down every 1 second
    var x = setInterval(function() {
    var now = new Date().getTime();
    // Find the distance between now an the count down date
    var distance = countDownDate - now; // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    // Output the result in an element with id="counter"11
    document.getElementById("counter").innerHTML =hours +"Hours" + minutes + " min " + seconds + "s ";
    // If the count down is over, write some text 
    if (distance < 0) {
    clearInterval(x);
    document.getElementById("counter").innerHTML = "EXPIRED";
    }
    }, 1000);
    </script>

    <?php } ?>

            </div>
 
<?php endif; ?>
<?php require_once "inc/footer.php"; ?>