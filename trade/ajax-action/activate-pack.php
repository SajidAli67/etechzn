<?php
ob_start();
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/etechzn.com/class/getSetClass.php";?>

<?php 
$aId = $_SESSION['aId'];
 $packId =$_POST['packId'];
$getInfo = new GetData();
$getInfo->timeZone();

$packageInfo = $getInfo->specificItem('packages_term',$packId,'id');
foreach($packageInfo as $data){
$packName 	  		= $data['terms_name'];
$packamount 	  = $data['amount'];
$days 			  = $data['days'];
$daily_percentage = $data['daily_percentage'];
$ref_vl1_percent = $data['ref_vl1_percent'];
$ref_lvl2_percent = $data['ref_lvl2_percent'];
$ref_lvl3_percent = $data['ref_lvl3_percent'];

}

$query = $getInfo->specificItem('tbl_admin',$aId,'aId');
foreach($query as $data){
$uid = $data['user_id'];
}

$user=$getInfo->specificItem('tbl_member',$uid, 'mId');
foreach($user as $data){
	$refLvl1 = $data['lvl_rf_id1'];
	$refLvl2 = $data['lvl_rf_id2'];
	$refLvl3 = $data['lvl_rf_id3'];
	$balance = $data['balance'];
}
$ref1=$getInfo->specificItem('tbl_member',$refLvl1, 'mId');
foreach($ref1 as $data){
	$ref1_balance = $data['balance'];
}
$ref2=$getInfo->specificItem('tbl_member',$refLvl2, 'mId');
foreach($ref2 as $data){
	$ref2_balance = $data['balance'];
}
$ref3=$getInfo->specificItem('tbl_member',$refLvl3, 'mId');
foreach($ref3 as $data){
	$ref3_balance = $data['balance'];
}
if($packamount <= $balance) {
	$user_balance = $balance -$packamount;

	$ref_percentage1 =($packamount*$ref_vl1_percent)/100;
	$ref_percentage2 =($packamount*$ref_lvl2_percent)/100;
	$ref_percentage3 =($packamount*$ref_lvl3_percent)/100;
	$addrefBlnc1 =$ref_percentage1 +$ref1_balance;
	$addrefBlnc2 =$ref_percentage2 +$ref2_balance;
	$addrefBlnc3 =$ref_percentage3 +$ref3_balance;
	// Update user_balance
	$getInfo->table_update('tbl_member',['balance'=>$user_balance],"mId = '$uid'");
	// Update ref_balance
	$getInfo->table_update('tbl_member',['balance'=>$addrefBlnc1],"mId = '$refLvl1'");
	$getInfo->table_update('tbl_member',['balance'=>$addrefBlnc2],"mId = '$refLvl2'");
	$getInfo->table_update('tbl_member',['balance'=>$addrefBlnc3],"mId = '$refLvl3'");

	// Insert package with all Info
	$date =date('Y-m-d');
	$timestamp = date("Y-m-d H:i:s");
	$interval = date('Y-m-d H:i:s',strtotime($timestamp . "+1 days"));

	$getInfo->insert_data('tbl_packages',['user_id'=>$uid, 'pack_term'=>$packId, 'ref_lv1'=>$refLvl1, 'ref_lv2'=>$refLvl2, 'ref_lvl3'=>$refLvl3, 'total_duration'=>$days, 'duration_count'=>0, 'pack_amount'=>$packamount, 'pack_nterest'=>$daily_percentage, 'intervalDate'=>$interval, 'interval_time'=>$interval, 'status'=>"active "]);

	echo "Your" . ' ' . $packName. ' ' . " Package"  . ' ' . $packamount. "$".' ' . " has been actiavted please check on your active Plans list.";
}
else {
	echo 'you need balance';
}
?>