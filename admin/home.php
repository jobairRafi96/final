<?php
 	session_start();
 	if (!isset($_SESSION['admin'])) {
 		header("location: Login.php");
 	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>admin Home Page</title>
</head>
<body>
	<h1 align="center">Welcome Admin</h1>


	<form>
	<center>
	<fieldset style="width: 350px">
		<legend>Admin access</legend>
	<table align="center">
	<tr> 
		<td><img src="hotel.png" height="50px" width="50px"> </td>

		<td align="center"><img src="manager.png" height="50px" width="50px"> </td>
		
	</tr>	
	<tr> </br>

		<td>

		<a href="hotel.php"><input type="button" name="" value="HOTEL"></br></br></a>

		</td>
		
			<td>

				<a href="Manager.php"><input type="button" name="" value="MANAGER"></br></br></a>
			</td>
		</tr>
		<tr> 
		<td><img src="guest.png" height="50px" width="50px"> </td>

		<td align="center"><img src="preview.png" height="50px" width="50px"> </td>
		
		</tr>	

		<tr>
			
		<td>
				<a href="Guest.php"><input type="button" name="" value="GUEST"></a>
				
			</td>

            <td>
				<a href="preview.php"><input type="button" name="" value="PREVIEW"></a>
				
			</td>
			
		</tr> 
		<tr>
            <td></td>
			<td> <br>
				<a href="logout.php"><input type="button" name="" value="Logout"></a>
			</td>
		</tr>
	</table>
	</center>
	</fieldset>
	</form>
</body>
</html>