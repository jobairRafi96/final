<?php	
	session_start();
	
	if(!isset($_SESSION['admin'])){  
		header("location: Login.php");
	}

	require_once('../../service/functions.php');
	$result = getAllManagerInfo();

?>



<!DOCTYPE html>
<html>
<head>
	<title>Manager List</title>
</head>
<body>
		<form>
			<fieldset style="width:100%">
				<table border="0" align="center" cellspacing="40" cellpadding=”10″>
					<tr>
						<td colspan="9" align="center">
						<h3>Manager List</h3>
						</td>
					</tr>
					<tr>
						<td>Photo</td>
						<td>Manager ID</td>
						<td>Manager Name</td>
						<td>Email</td>
						<td>Address</td>
						<td>Phone Number</td>

					</tr>
					
					<?php	while($row = mysqli_fetch_assoc($result)){ ?>
		
					<tr>
						<td><img src="<?php 


							echo "../manager/".$row['profile_pic']; 

							?>" height="100px" width="100px">
							
								
						</td>
						<td><?=$row['manager_id']?></td>
						<td><?=$row['manager_name']?></td>
						<td><?=$row['email']?></td>
						<td><?=$row['address']?></td>
						<td><?=$row['phone_no']?></td>

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