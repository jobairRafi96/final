<?php
	
	require_once('db.php');
	if(isset($_POST['id'])){  
		$roomId = $_POST['id'];
	}

/*	if(isset($_POST['hotelid'])){  
		$hotelId = $_POST['hotelid'];
	}*/

	$con = getConnection();
	$sql = "UPDATE room SET available='1' WHERE room_id='{$roomId}'";
	$result = mysqli_query($con, $sql);

	if(mysqli_affected_rows($con)){
		echo "Room checked.";
	}else{
		echo "failed!";
	}


?>