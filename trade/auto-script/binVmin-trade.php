<?php
ob_start();
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/etechzn.com/class/getSetClass.php"; ?>
<?php
$getData = new GetData();
$current_time = $getData->timeZone();
$getTradeData = $getData->specificItem('trades', 'id', 1);
$ref_bonus_lvl1 = 0;
$ref_bonus_lvl2 = 0;

foreach ($getTradeData as $trades) {
	$tr_id = $trades['tr_id'];
	$log_trade = $trades['log_trade'];
	$short_trade = $trades['short_trade'];
	$trade_cat = $trades['trade_cat'];
	$trade_term = $trades['trade_term'];
	$duration = $trades['duration'];
	$start_time = $trades['start_time'];
	$end_time = $trades['end_time'];
}
$tradeterm = $getData->specificItem('trade_tersm', 'id',2);

foreach ($tradeterm as $terms) {
	$bonus_percentage = $terms['bonus_percentage'];
	$min_trade = $terms['min_trade'];
	$ref_bonus_lvl1 = $terms['ref_bonus_lvl1'];
	$ref_bonus_lvl2 = $terms['ref_bonus_lvl2'];
}


$currentTime = date('Y-m-d H:i:s', time());
$date = date('Y-m-d');
if($currentTime > $end_time || $currentTime == $end_time) {
	$interval = date('Y-m-d H:i:s',strtotime($end_time ."+ 5 minute"));
	$getData->table_update('trades',array('end_time'=>$interval));
	if ($log_trade > $short_trade) {
		$wintrade = "short";
		$losstrade = "long";
	} elseif ($log_trade < $short_trade) {
		$wintrade = "long";
		$losstrade = "short";
	} else {
		$wintrade = "short";
		$losstrade = "long";
	}
	// update trade history data
	$getData->insert_data('trade_history', ['tr_id' => $tr_id, 'log_trade_amount' => $log_trade, 'short_trade_amount' => $short_trade, 'trade_cat' => $trade_cat, 'trade_term' => 2, 'start_time' => $start_time, 'end_time' => $interval, 'date' => $currentTime, 'win_type' => $wintrade, 'loss_type' => $losstrade]);

	// Updtae User balance and win loss history
	if ($wintrade == "short") {
		$getData->table_update('trade_user_history', ['win' => "short", 'loss' => "long"], 'trade_type = "' . ("short") . '" AND trade_id = "' . ($tr_id) . '"');
		$getData->table_update('trade_user_history', ['win' => "short", 'loss' => "long"], 'trade_type = "' . ("long") . '" AND trade_id = "' . ($tr_id) . '"');
	} elseif ($wintrade == "long") {
		$getData->table_update('trade_user_history', ['win' => "long", 'loss' => "short"], 'trade_type = "' . ("long") . '" AND trade_id = "' . ($tr_id) . '"');
		$getData->table_update('trade_user_history', ['win' => "long", 'loss' => "short"], 'trade_type = "' . ("short") . '" AND trade_id = "' . ($tr_id) . '"');
	} 
	$tradeterm = $getData->specificItem('trade_tersm', 'id', 2);
	foreach ($tradeterm as $terms) {
		$bonus_percentage = $terms['bonus_percentage'];
		$min_trade = $terms['min_trade'];
		$ref_bonus1 = $terms['ref_bonus_lvl1'];
		$ref_bonus2 = $terms['ref_bonus_lvl2'];
		
	}
	$tradeHistory = $getData->specificItem('trade_user_history', 'trade_id', $tr_id);

	foreach ($tradeHistory as $user) {
		$id = $user['id'];
		$user_id = $user['user_id'];
		$win = $user['win'];
		$loss = $user['loss'];
		$trade_type = $user['trade_type'];
		$trade_amount = $user['trade_amount'];
		if ($trade_type == $win){
			$winBl = ($trade_amount * $bonus_percentage) / 100;
			$winBl = number_format($winBl, 2);
			$totalBlnc = $trade_amount + $winBl;
			$ref1Bonus = ($trade_amount * $ref_bonus_lvl1) / 100;
			$ref2Bonus = ($trade_amount * $ref_bonus_lvl2) / 100;
			$addBonusref1=0;
			$addBonusref2=0;
			$getUserMainBlncInfo = $getData->specificItem('tbl_member', 'mId', $user_id);
			foreach ($getUserMainBlncInfo as $mainBln) {
				$balance = $mainBln['balance'];
				$ref1 = $mainBln['lvl_rf_id1'];
				$ref2 = $mainBln['lvl_rf_id2'];
				$getRef1BlncInfo = $getData->specificItem('tbl_member', 'mId', $ref1);
				$getRef2BlncInfo = $getData->specificItem('tbl_member', 'mId', $ref2);
				foreach ($getRef1BlncInfo as $ref1Bln){
					$user_id = $ref1Bln['mId'];
					$balanceRf1 = $ref1Bln['balance'];
					$addBonusref1 = $ref1Bonus + $balanceRf1;
					$addBonusref2 = $ref2Bonus + $addBonusref1; 
				}
				// foreach ($getRef2BlncInfo as $ref1Bln){
				// 	$user_id = $ref1Bln['mId'];
				// 	$balanceRf2 = $ref1Bln['balance'];
				// 	$addBonusref2 = $ref2Bonus + $balanceRf2;
				// }
			}
			$getData->insert_data('trade_ref', ['user_id' => $ref1, 'tr_id' => $tr_id, 'amount' => $ref1Bonus]);
			$getData->insert_data('trade_ref', ['user_id' => $ref2, 'tr_id' => $tr_id, 'amount' => $ref2Bonus]);
			$getData->table_update('tbl_member',array('balance'=>$addBonusref1),'mId ='. $ref1);
			$getData->table_update('tbl_member',array('balance'=>$addBonusref2),'mId ='. $ref2);
		}	
	}
	$user_amount = $getData->itemLast('trade_user_history', 'trade_id',$tr_id);
	$trade_id = $user_amount['id'];
	$user = $user_amount['user_id'];
	$win = $user_amount['win'];
	$loss = $user_amount['loss'];
	$short_amount = $user_amount['trade_amount'];
	$trade_type = $user_amount['trade_type'];
	$user_blance = $getData->specificItem('tbl_member', 'mId', $user);
	if ($trade_type == $win) {
		$win_amount = ($short_amount * 0.5) + $short_amount;
		$add_amount = $win_amount + $user_blance[0]['balance'];
		$getData->table_update('tbl_member',array('balance'=>$add_amount),'mId ='. $user);
		$getData->table_update('trade_user_history',array('win_amount'=> $win_amount,'loss_amount'=>0),'id ='. $trade_id);
	}else{
		$balance = $getData->specificItem('tbl_balance', 'balance_id', 1);
		$trade_amount = $balance[0]['balance_amount'] + $short_amount;
		$getData->table_update('trade_user_history',array('win_amount'=> 0,'loss_amount'=>$short_amount),'id ='. $trade_id);
		$getData->table_update('tbl_balance',array('balance_amount'=>(int)$trade_amount),'balance_id=1');
	}
	$getData->table_update('trades',['tr_id'=>$getTradeData['0']['tr_id']+1,'log_trade'=>0,'short_trade'=>0], "id=1");
}
?>