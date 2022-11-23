<?php
include $_SERVER['DOCUMENT_ROOT'] . "/etechzn.com/class/getSetClass.php";
$getData = new Getdata();
$data=array(
    'user_id'=>$_POST['user_id'],
    'bet_id'=>$_POST['bet_id'],
    'country_select_id'=>$_POST['country'],
    'play_status'=>'padding',
    'win_loss_amount'=>0,
);
    $insert = $getData->insert_data('bet_user_history',$data);
    if($insert){
       print_r(json_encode(array('status'=>true,'message'=>'you bet is set')));
    }
    else{
       print_r(json_encode(array('status'=>false,'message'=>'Some think is missing')));
    }
?>