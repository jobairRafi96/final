<?php
	
	require_once('db.php');
	if(isset($_GET['id'])){  
		$guestId = $_GET['id'];
	}

	$con = getConnection();
	//$con = mysqli_connect('127.0.0.1', 'root', '', 'hms');
	$sql = "select * from guestpi where guest_id='{$guestId}'";
	$result = mysqli_query($con, $sql);
	
	//$count =mysqli_num_rows($result);
	$guestPI = mysqli_fetch_assoc($result);

	//echo $count;
	//echo print_r($guestPI);


	if(!empty($guestPI['name'])){
		echo $guestPI['name'];
	}else{
		echo "not found!";
	}
	


?>