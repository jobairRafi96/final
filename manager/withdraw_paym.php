<?php	
	session_start();
	include('../../service/functions.php');

	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}
	if(!isset($_SESSION['hotel'])){  
		echo "ERROR!";
	}

	$hotelFundArray = getFundValue($_SESSION['hotel']['hotel_id']); 
    $fund = $hotelFundArray['fund'];

	if(isset($_REQUEST['withdraw']))
    {
    	if(isset($_POST['amount'])){
    	$amount = $_POST['amount'];
    	}

       	$updatedFund = $fund - $amount;                //updated Fund  


		$con = getConnection();
		$sql = "UPDATE hotel SET fund='{$updatedFund}' WHERE hotel_id='{$_SESSION['hotel']['hotel_id']}'";
		$result = mysqli_query($con, $sql);

		if(mysqli_affected_rows($con)){
			$alert = "<script>
	        alert('Withdrawn Successfully.');
	        </script>";
	        echo $alert;
		}else{
			$alert = "<script>
	        alert('Failed!');
	        </script>";
	        echo $alert;
		}

    }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Withdraw Payments</title>
</head>
<body>
		<form action="" method="POST">
			<fieldset style="width:100%" align="center">
				<legend>Withdraw Payments</legend>
				<table border="0" align="center" cellspacing="20" cellpadding=”10″>
					
					<tr>
						<td>Fund Available: </td>
						<td><?=$fund?></td>
					</tr>
					<tr>
						<td><input type="number" name="amount" required></td>
						<td><input type="submit" name="withdraw" value="withdraw"></td>
					</tr>

				</table>
				
				</br><hr>
				<a href="manager_home.php">Homepage</a></br>
			</fieldset>
		</form>
</body>
</html>