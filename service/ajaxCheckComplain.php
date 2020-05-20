<?php
	
	require_once('db.php');
	if(isset($_POST['id'])){  
		$complainId = $_POST['id'];
	}

	$con = getConnection();
	$sql = "UPDATE complain SET checked=true WHERE complain_id='{$complainId}'";
	$result = mysqli_query($con, $sql);

	if(mysqli_affected_rows($con)){
		echo "Complain checked.";
	}else{
		echo "failed!";
	}


?>