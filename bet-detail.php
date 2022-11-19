<?php require_once "include/header.php"; ?>

 <section class="section section-lg text-center" id="pricing" data-type="anchor">
        <div class="container">
          <h3>Today's Bets</h3>
          <?php

// Get current time stamp
$now = new DateTime();
$now->format('Y-m-d H:i:s');  
echo $now->getTimestamp(), "\n";

// Add interval of P1D or Period of 1 Day
$now->add(new DateInterval('P1D'));
echo $now->getTimestamp();

?>

        </div>
      </section>
</br>
</br>
</br>
<?php require_once "include/footer.php"; ?>