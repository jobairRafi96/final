<?php
	
	require_once('db.php');
	if(isset($_POST['id'])){  
		$serviceId = $_POST['id'];
	}

	$con = getConnection();
	$sql = "UPDATE service SET checked=true WHERE service_id='{$serviceId}'";
	$result = mysqli_query($con, $sql);

	if(mysqli_affected_rows($con)){
		echo "Service checked.";
	}else{
		echo "failed!";
	}


?>