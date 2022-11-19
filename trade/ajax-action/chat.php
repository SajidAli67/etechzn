<?php
 require_once "../../class/db.php"; 
    $message =  $_POST['message'];
   $sender = $_POST['sender'];
   $reciver = $_POST['reciver'];
 if($_FILES['file']['name'] != ''){

	$filename = $_FILES['file']['name']; // Get the Uploaded file Name.

	$extension = pathinfo($filename,PATHINFO_EXTENSION); //Get the Extension of uploded file.

	$valid_extensions = array("jpg","jpeg","png","gif");

	if(in_array($extension, $valid_extensions)){ // check if upload file is a valid image file.
		$new_name = rand() . "." . $extension;
		$path = "../../images/chat/" . $new_name;

		if(move_uploaded_file($_FILES['file']['tmp_name'], $path)){ // Upload the Image File on server path
      $sql = "INSERT INTO tbl_chat (message, sender_id, reciver_id, img) values('$message', '$sender', '$reciver','$new_name') ";
        $pdo->query($sql);
		}

	}else{
		echo '<script>alert("Invalid File Format.")</script>';
	}

}else{
  $sql = "INSERT INTO tbl_chat (message, sender_id, reciver_id, img) values('$message', '$sender', '$reciver','')";
  $pdo->query($sql);
}


  
?>