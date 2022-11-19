<?php 
session_start();

require_once 'db.php';

// echo $_SESSION['userId'];

if(!$_SESSION['aId']) {
	header('location:../login.php');	
} 

$author = $_SESSION["aId"];
?>