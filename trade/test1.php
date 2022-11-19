 <?php
 // include $_SERVER['DOCUMENT_ROOT'] . "/etechzn.com/class/getSetClass.php";

 //        $gteTime = new GetData();

 //        $gteTime->timeZone();
 //        // Database Connection
      $host = "localhost";
$user = "root";
$pass = "";
$dbname = "crypto_trade";

$db = new mysqli($host, $user, $pass, $dbname);

        $result = "SELECT *,SUM(amount) trade_ref GROUP BY user_id";
        $query= $db->query($result);
        while ($row = $query->mysqli_fetch_assoc()){
            echo $row['id'];
        }
    

    ?>