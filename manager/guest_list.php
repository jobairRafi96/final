<?php	
	session_start();

	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}

	require_once('../../service/functions.php');
	$result = getVerifiedGuestList();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Guest List</title>
</head>
<body>
		<form>
			<fieldset style="width:100%">
				<table border="0" align="center" cellspacing="40" cellpadding=”10″>
					<tr>
						<td colspan="9" align="center">
						<h3>Guest List</h3>
						</td>
					</tr>
					<tr>
						<td>Photo</td>
						<td>Guest ID </td>
						<td>Name</td>
						<td>Email</td>
						<td>Address</td>
						<td>Date of Birth</td>
						<td>Phone Number</td>
						<td>Payment Type</td>
						<td>Member Status</td>
					</tr>
					
					<?php	while($row = mysqli_fetch_assoc($result)){ ?>
		
					<tr>
						<td><?=$row['guest_id']?>pic</td>
						<td><?=$row['guest_id']?></td>
						<td><?=$row['name']?></td>
						<td><?=$row['email']?></td>
						<td><?=$row['address']?></td>
						<td><?=$row['dob']?></td>
						<td><?=$row['phone_no']?></td>
						<td><?=$row['payment_type']?></td>
						<td><?=$row['membership_status']?></td>
					</tr>
				
					<?php } ?>
					
					<tr>
						<td colspan="9" align="center">
							<a href="manager_home.php">Goto Homepage</a></br>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
</body>
</html>