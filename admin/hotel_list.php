<?php	
	session_start();
	
	if(!isset($_SESSION['admin'])){  
		header("location: Login.php");
	}

	require_once('../../service/functions.php');
	$result = getAllHotelInfo();

?>




<!DOCTYPE html>
<html>
<head>
	<title>Hotel List</title>
</head>
<body>
		<form>
			<fieldset style="width:100%">
				<table border="0" align="center" cellspacing="40" cellpadding=”10″>
					<tr>
						<td colspan="9" align="center">
						<h3>Hotel List</h3>
						</td>
					</tr>
					<tr>
						<td>Photo</td>
						<td>Hotel ID </td>
						<td>Manager ID</td>
						<td>Hotel Name</td>
						<td>Address</td>
						<td>Phone Number</td>
						<td>Avg Rating</td>
						<td>Discount</td>
						<td>Fund</td>
					</tr>
					
					<?php	while($row = mysqli_fetch_assoc($result)){ ?>
		
					<tr>
						<td><img src="<?php 


							echo "../hotel/".$row['hotel_pic']; 

							?>" height="100px" width="100px">
							
								
						</td>
						<td><?=$row['hotel_id']?></td>
						<td><?=$row['manager_id']?></td>
						<td><?=$row['hotel_name']?></td>
						<td><?=$row['address']?></td>
						<td><?=$row['phone_no']?></td>
						<td><?=$row['avg_rating']?></td>
						<td><?=$row['discount']?></td>
						<td><?=$row['fund']?></td>

					</tr>
				
					<?php } ?>
					
					<tr>
						<td colspan="9" align="center">
							<a href="home.php">Goto Homepage</a></br>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
</body>
</html>