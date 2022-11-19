<?php 
// Setting up the default time zone
date_default_timezone_set('Asia/Dhaka');

// Host Host Name
$dbhost = 'localhost';

// Database Username
$dbuser = 'root';

//Database Password
$dbpass = '';

//Database Name
$dbname = 'etechdss_demo';

// Defining base url
define("BASE_URL", "localhost/etech_micro/");

// Getting Admin url
define("ADMIN_URL", BASE_URL. "/");


try {
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $exception ) {
	echo "Connection error :" . $exception->getMessage();
}
?>