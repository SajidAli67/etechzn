<?php
require_once "../../class/db.php";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$sender = $_POST['sender'];
$reciver = $_POST['reciver'];
 
$sql  = " SELECT * FROM tbl_chat where (sender_id = '$sender' AND reciver_id = '$reciver') OR (sender_id = '$reciver' AND reciver_id = '$sender')";
$query =  mysqli_query($conn, $sql);
while ($data = mysqli_fetch_assoc($query)) {
?>
    <?php if ($data['sender_id'] == $sender) { ?>
        <li class="chat-left">
            <div class="chat-avatar">
                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                <div class="chat-name"></div>
            </div>
            <div class="chat-text">
                <?php
                    if($data['img']){?>
                    <img src="../images/chat/<?= $data['img'] ?>" style="width:200px; height:auto"><br>

                <?php   
                   echo  $data['message'];
                    }
                
                 else{  
                   echo $data['message']; 
                }  ?>
             
            </div>
            <div class="chat-hour"><?= date('h:i',strtotime($data['time'])) ?> <span class="fa fa-check-circle"></span></div>
        </li>

    <?php } else { ?>
        <li class="chat-right">
            <div class="chat-hour"><?= date('h:i',strtotime($data['time'])) ?> <span class="fa fa-check-circle"></span></div>
            <div class="chat-text">
            <?php
                    if($data['img']){?>
                    <img src="../images/chat/<?= $data['img'] ?>" style="width:200px; height:auto"><br>

                <?php   
                   echo  $data['message'];
                    }
                
                 else{  
                   echo $data['message']; 
                }  ?>
            </div>
            <div class="chat-avatar">
                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                <div class="chat-name"></div>
            </div>
        </li>
<?php }
} ?>