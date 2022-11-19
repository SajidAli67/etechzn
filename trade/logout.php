<?php
	ob_start();
	session_start();
	include "../class/db.php"; 
	unset($_SESSION['admin']);
	unset($_SESSION['aId'] );
	unset($_SESSION['username']);
	unset($_SESSION['email'] );
	unset($_SESSION['mobile']);
	unset($_SESSION['fname']);
	unset($_SESSION['lname'] );
	unset($_SESSION['website'] );
	unset($_SESSION['picture'] );
	unset($_SESSION['role'] );
	unset($_SESSION['status'] );
	unset($_SESSION['note'] );
	header("location:../login.php"); 
?>