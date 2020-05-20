<?php	
	session_start();
	
	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}

	require_once('../../service/functions.php');
	$result = getChefListByManagerId($_SESSION['manager']['manager_id']);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Chef List</title>
</head>
<body>
		<form>
			<fieldset style="width:100%">
				<table border="0" align="center" cellspacing="40" cellpadding=”10″>
					<tr>
						<td colspan="9" align="center">
						<h3>Chef List</h3>
						</td>
					</tr>
					<tr>
						<td>Chef ID </td>
						<td>Name</td>
						<td>Address</td>
						<td>Email</td>
						<td>Phone Number</td>
					</tr>
					
					<?php	while($row = mysqli_fetch_assoc($result)){ ?>
		
					<tr>
						<td><?=$row['chef_id']?></td>
						<td><?=$row['name']?></td>
						<td><?=$row['address']?></td>
						<td><?=$row['email']?></td>
						<td><?=$row['phone_no']?></td>
					</tr>
				
					<?php } ?>
					
					<tr>
						<td colspan="5" align="center">
							<a href="manager_home.php">Goto Homepage</a></br>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
</body>
</html>