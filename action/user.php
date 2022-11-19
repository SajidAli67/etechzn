<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/etechzn.com/class/getSetClass.php";

$userDataInput = new GetData();

if (isset($_POST['loginForm'])) {
$fname		=trim($_POST['fname']);
$username	=trim($_POST['username']);
$email		=trim($_POST['email']);
$password	=trim($_POST['password']);
$conPassword =trim($_POST['conPassword']);
$reffid		=trim($_POST['reffid']);
$msg ="Please Check your fileds";

if (empty($fname)) {
	echo $msg;
}else{

}

$date =date('Y-m-d');
$timestamp = date("Y-m-d H:i:s");
$time = date('H:i:s');
$filter=$userDataInput->data_exist('tbl_admin', 'email' , "$email");

$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
		$password = hash('sha256', $conPassword.$salt);
		for($round = 0; $round < 65536; $round++) 
		{ 
			$password = hash('sha256', $password.$salt); 

		}
if ($filter != true) {
$defultRef = 1094;
$rf = $reffid;
$reffid= filter_var($rf, FILTER_SANITIZE_NUMBER_INT);
$rfid =intval($reffid);

if (!empty($reffid)) {
	// If reeference id is not empty
	$result =$userDataInput->specificItem('tbl_member', 'mId', $rfid);
	foreach($result as $data){
		$refferal2 = $data['lvl_rf_id1'];
		$refferal3 = $data['lvl_rf_id2'];
	}
		$result =$userDataInput->insert_data('tbl_member',['referral_code'=>"None", 'lvl_rf_id1'=>$rfid, 'lvl_rf_id2'=>$refferal2, 'lvl_rf_id3'=>$refferal3, 'member_name'=>$fname, 'gender'=>"None", 'birthday'=>"None", 'nationality'=>"None", 'city'=>"None", 'phone'=>"None", 'balance'=>0, 'address'=>"None", 'photo'=>"None", 'nid_front'=>"None", 'nid_back'=>"None", 'joinDate'=>$date, 'joinTime'=>$time, 'timestamp1'=>$timestamp, 'status'=>"active"]);

		// echo $result;
		$letter= "refferel_code";
		$lastid= $result;
		$updaterefCode = $letter.$lastid;
		$userDataInput->table_update('tbl_member',['referral_code'=>$updaterefCode], "mId='$lastid'");

		$userDataInput->insert_data('tbl_admin',['user_id'=>$lastid, 'agent_id'=>0, 'username'=>$username, 'email'=>$email, 'joinDate'=>$date, 'joinTime'=>$time, 'timestamp1'=>$timestamp, 'password'=>$password, 'salt'=>$salt, 'role'=>"user", 'verify_status'=>"Y", 'verify_code'=>0, 'forgotPasswordCode'=>0, 'ip'=>0, 'status'=>1, 'last_update'=>$date, 'author'=>0]);

		header("Location: http://localhost/etechzn.com/login.php"); 
}

else{
	// if refferal code is  empty

		$result =$userDataInput->insert_data('tbl_member',['referral_code'=>"None", 'lvl_rf_id1'=>$defultRef, 'lvl_rf_id2'=>$defultRef, 'lvl_rf_id3'=>$defultRef, 'member_name'=>$fname, 'gender'=>"None", 'birthday'=>"None", 'nationality'=>"None", 'city'=>"None", 'phone'=>"None", 'balance'=>0, 'address'=>"None", 'photo'=>"None", 'nid_front'=>"None", 'nid_back'=>"None", 'joinDate'=>$date, 'joinTime'=>$time, 'timestamp1'=>$timestamp, 'status'=>"active"]);

		// echo $result;
		$letter= "refferel_code";
		$lastid= $result;
		$updaterefCode = $letter.$lastid;
		$userDataInput->table_update('tbl_member',['referral_code'=>$updaterefCode], "mId='$lastid'");

		$userDataInput->insert_data('tbl_admin',['user_id'=>$lastid, 'agent_id'=>0, 'username'=>$username, 'email'=>$email, 'joinDate'=>$date, 'joinTime'=>$time, 'timestamp1'=>$timestamp, 'password'=>$password, 'salt'=>$salt, 'role'=>"user", 'verify_status'=>"Y", 'verify_code'=>0, 'forgotPasswordCode'=>0, 'ip'=>0, 'status'=>1, 'last_update'=>$date, 'author'=>0]);
		header("Location: http://localhost/etechzn.com/login.php"); 

		// echo $letter.$lastid . "</br>";

}


	echo "Inserted"; 
	
}
else{
	echo "email exist";
}

}
?>
