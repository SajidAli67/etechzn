<?php
ob_start();
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/etechzn.com/class/getSetClass.php";
?>

<?php
$tradType = $_POST['tradeType'];
$trade_amount=$_POST['trade_amount'];
$getData =new GetData();
$tradTpyeWord = ($tradType==1?'short':'long');

$getData->timeZone();
$userId = $getData->getUserId();
$userId = $userId;
$balance = $getData->getUserBalance();
$userBalance = $balance;
if ($trade_amount <= $userBalance) {
	$userBalance =$userBalance -$trade_amount;
	$getData->table_update('tbl_member',['balance'=>$userBalance],"mId = '$userId'");

	$getTradeData= $getData->specificItem('trades', 'id', 1);
	foreach($getTradeData as $trades){
		$tr_id =$trades['tr_id'];
		$log_trade =$trades['log_trade'];
		$short_trade =$trades['short_trade'];
		$trade_cat =$trades['trade_cat'];
		$duration =$trades['duration'];
		
		}
	$currentTime = date('Y-m-d H:i:s', time());
	if ($tradType ==1) {
		// update  short Trade amount
		$shortAmount = $trade_amount + $short_trade;
		$getData->table_update('trades',['short_trade'=>$shortAmount],"tr_id = '$tr_id'");

		// Insert in User History
		 $getData->insert_data('trade_user_history',(['user_id'=>$userId, 'trade_id'=>$tr_id,'trade_terms'=>2,'trade_type'=>$tradTpyeWord,'trade_amount'=>$trade_amount,  'win'=>"Pending", 'loss'=>"Pending", 'time'=>$currentTime] ) );

		 echo "Trade Succsessful";
	} 

	// SHort end
	else{
		// update Long Trade amount
		$longAmount = $trade_amount + $log_trade;
		$getData->table_update('trades',['log_trade'=>$longAmount],"tr_id = '$tr_id'");
		 $getData->insert_data('trade_user_history',(['user_id'=>$userId, 'trade_id'=>$tr_id,'trade_terms'=>2,'trade_type'=>$tradTpyeWord,'trade_amount'=>$trade_amount, 'win'=>"Pending",'loss'=>"Pending", 'time'=>$currentTime] ) );
		// Insert in User History
		 echo "Trade Succsessful";
	}

	// Long END

	}
	// balance Verification end
	else{
		echo "Please Recharge Balance";
	}









// echo $userId ."<br>";
// echo $tradType ."<br>";
// echo $trade_amount ."<br>";
// echo $userBalance;

?>