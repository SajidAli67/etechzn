<?php
ob_start();
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/etechzn.com/class/getSetClass.php";
$user_id = $_POST['user_id'];
$getData = new GetData();
$balance = $getData->specificItem('tbl_member','mId',$user_id);
if($_POST['verify']==0){
    $add_balance= $balance[0]['balance']+5;

}
else{
    $add_balance= $balance[0]['balance'];

}
$data = array(
    'member_name' => $_POST['member_name'],
    'gender' => $_POST['gender'],
    'birthday' => $_POST['birthday'],
    'nationality' => $_POST['nationality'],
    'city' => $_POST['city'],
    'phone' => $_POST['phone'],
    'balance' => $add_balance,
    'address' => $_POST['address'],
    'verify '=>1
);

$update = $getData->table_update('tbl_member',$data,'mId ='.$user_id);
if($update){
    print_r (array('status'=>true,'Message'=>'Your data is verifty '));
}
else{
    print_r(array('status'=>false,'Message'=>'Your data is not verifty'));

}
?>