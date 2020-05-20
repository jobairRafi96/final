<?php
	
	require_once('db.php');
	if(isset($_POST['guestId'])){  
		$guestId = $_POST['guestId'];
	}

	if(isset($_POST['status'])){  
		$statusType = $_POST['status'];
	}

	$con = getConnection();
	$sql = "UPDATE guestpi SET membership_status='{$statusType}' WHERE guest_id='{$guestId}'";
	$result = mysqli_query($con, $sql);

	if(mysqli_affected_rows($con)){
		echo "success.";
	}else{
		echo "failed!";
	}



	
	//$count =mysqli_num_rows($result);
	//$guestPI = mysqli_fetch_assoc($result);

	//echo $count;
	//echo print_r($guestPI);


/*	if(!empty($guestPI['name'])){
		echo $guestPI['name'];
	}else{
		echo "not found!";
	}*/
	


?>