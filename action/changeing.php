<?php
include $_SERVER['DOCUMENT_ROOT'] . "/etechzn.com/class/getSetClass.php";
$getData = new GetData();

if($_GET['approve']){
    $user_id = $_GET['approve'];
   $data = $getData->table_update('tbl_admin',array('approved'=>1),'aId ='.$user_id);
    header('location:../trade/agent-set.php');
}

if($_GET['delete']){
   echo $_GET['delete'];
}
?>