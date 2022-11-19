<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to Create Countdown Timer using JS,PHP and MySQL? - Nicesnippets.com</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Poppins fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style type="text/css">
        body{
            font-family: 'Poppins', sans-serif;
        }
        #counter{
            width: 410px;
            background: #ff190b;
            box-shadow: 0px 2px 9px 0px black;
        }
    </style>
</head>
<body>

    <?php
    date_default_timezone_set("Asia/Dhaka");
date_default_timezone_get();
        // Database Connection
        $mysqli = mysqli_connect('localhost','root','','crypto_trade');

        $result = mysqli_query($mysqli, "SELECT * FROM trades WHere id = 1");
        while($res = mysqli_fetch_array($result)) { 

            $end_time =$res['end_time'];
            $splitTimeStamp = explode(" ",$end_time);
            $date = $splitTimeStamp[0];
            $time = $splitTimeStamp[1];
        }
        
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mt-40">
                <div class="card" style="height: 400px;">
                    <div class="card-header text-white text-center" style="background: #343a40;">
                        <h2>How to Create Countdown Timer using JS,PHP and MySQL? - Nicesnippets.com</h2>     
                    </div>
                    <div class="card-body pt-5">
                        <h1 id="counter" class="text-center mt-5 m-auto p-3 text-white"></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
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
            document.getElementById("counter").innerHTML = minutes + "min" + seconds + "s ";
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("counter").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>

</body>
</html>