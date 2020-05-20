<?php
	
	//require_once('db.php');
	require_once('functions.php');

	if(isset($_POST['id'])){  
		$orderId = $_POST['id'];


		$result = getGroceryRowById($orderId);
		$array = mysqli_fetch_assoc($result); 
		$ava_qty = $array['ava_quantity'];
		$req_qty = $array['req_quantity'];

		$ava_qty = $ava_qty + $req_qty;
		$req_qty = 0;

		$con = getConnection();
		$sql = "UPDATE grocery SET checked=true, ava_quantity='{$ava_qty}', req_quantity='{$req_qty}' WHERE grocery_orderid='{$orderId}'";
		$result = mysqli_query($con, $sql);


		if(mysqli_affected_rows($con)){
			echo "Grocery Checked.";
		}else{
			echo "failed!";
		}
	}

?>