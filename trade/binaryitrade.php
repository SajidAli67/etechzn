<?php require_once "inc/header.php";
if ($_SESSION['admin']['role'] == "user") :
?>
  <?php
  $getData = new GetData();

  $getData->timeZone();
  $balance = $getData->getUserBalance();
  $userBalance = $balance;
  // $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // $sql  = "SELECT * FROM trades where id = 1";
  // $query =  mysqli_query($conn, $sql);
  $getTime = $getData->specificItem('trades', 'id', 1);

  foreach ($getTime as  $time) {
    $end_time = $time['end_time'];
    $splitTimeStamp = explode(" ", $end_time);
    $date = $splitTimeStamp[0];
    $time = $splitTimeStamp[1];
  }

  ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div>
          <div style="float:left;width:50%">

            <p class="text-success" id="btc"></p>
            <p class="text-warning" id="vlm"></p>
          </div>
          <div style="float:right;width:50%" align="right">
            <p class="text-danger" id="counter"></p>
          </div>
        </div>
      </div>

      <!--  <div class="row">
<div class="card-body" align="center">
<h5 id="countdown"></h5>
<h5 id="btc"></h5>
<h5 id="vlm"></h5>
</div>

</div> -->
      <div class="row" style="background:#011012;" align="center">


        <canvas width="1280" height="500" id="canvas"></canvas>

      </div>
      <br>
      <div class="row">
        <div>
          <div style="float:left;width:50%">
            <div style="float:left;width:50%">
              <p class="text-success">Today's Open</p>
            </div>
            <div style="float:left;width:50%">
              <p class="text-danger">$20000</p>
            </div>
            <div style="float:left;width:50%">
              <p class="text-success">Today's High</p>
            </div>
            <div style="float:left;width:50%">
              <p class="text-danger">$20000</p>
            </div>
            <div style="float:left;width:50%">
              <p class="text-success">Today's Low</p>
            </div>
            <div style="float:left;width:50%">
              <p class="text-danger">$20000</p>
            </div>
            <div style="float:left;width:50%">
              <p class="text-success">Today's Close</p>
            </div>
            <div style="float:left;width:50%">
              <p class="text-danger">$20000</p>
            </div>
          </div>
          <div style="float:right;width:50%" align="center">
            <div class="btn-group">

              <button type="button" id="shortTrade" class="btn btn-danger">Short</button>
              <button type="button" id="longTrade" class="btn btn-success">Long</button>
            </div>

            <form id="binaryitradeVminForm">
              <br>
              <div>

                <input type="hidden" class="form-control" style="width:100px" id="tradeType" name="tradeType">
                <p class="text-danger">Balance : <?php echo $userBalance; ?></p>
                <p id="msg"></p>
                <input type="number" class="form-control text-danger" id="trade_amount" placeholder="Amount" style="width:100px" name="trade_amount" min="0" value="0" step="0.01">
              </div>
              <br>

              <button type="button" id="confirmTrade" class="btn btn-inverse-danger btn-fw">Bet Now</button>
            </form>
          </div>
        </div>
      </div>

    <?php endif; ?>
    <!-- <?php require_once "inc/footer.php"; ?> -->
    <script>
      // btc live last rate
      function get_price() {
        var el = document.getElementById('btc')
        fetch("https://www.bitstamp.net/api/ticker/")
          .then(res => res.json())
          .then(response => {
            var price = response.last;
            var vl = response.volume;
            el.innerHTML = "BTC-$" + price;
          }).catch(err => {
            el.innerHTML = "BTC-$" + price;
          });
      }
      get_price();

      setInterval(get_price, 1000)

      function get_vl() {
        var el = document.getElementById('vlm')
        fetch("https://www.bitstamp.net/api/ticker/")
          .then(res => res.json())
          .then(response => {
            var vl = response.volume;
            el.innerHTML = "Volume-$" + vl;
          }).catch(err => {
            el.innerHTML = "Volume-$" + vl;
          });
      }

      get_vl();

      setInterval(get_vl, 1000)

      function checkTime() {
        var id = 1;
        $.ajax({
          url: 'auto-script/binVmin-trade.php',
          type: 'POST',
          data: {
            id: id
          },
          success: function(data) {
            console.log(data);
          }
        });
      }

      checkTime();

      setInterval(checkTime, 1000)
      // time counter
      <?php
      $data = strtotime($date);
      $getDate = date(" Y, F, d", $data);
      ?>
      var countDownDate = new Date("<?php echo "$getDate $time"; ?>").getTime();
      // Update the count down every 1 second
      var x = setInterval(function() {
        var now = new Date().getTime();
        // Find the distance between now an the count down date
        var distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Output the result in an element with id="counter"11
        document.getElementById("counter").innerHTML = minutes + " min " + seconds + "s ";
        // If the count down is over, write some text 
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("counter").innerHTML = "EXPIRED";
          // window.location.reload(true);
        }
      }, 1000);
    </script>
    <script src="custom-js/trade.js"></script>
    <script src="candle/pingpoliCandlestickChart.js"></script>
    <script src="candle/CandlestickStream.js"></script>
    <script src="candle/pingpoliWebSocket.js"></script>

    <script>
      var candlestickStream = new CandlestickStream("btceur", "1s");
      candlestickStream.start();
    </script>