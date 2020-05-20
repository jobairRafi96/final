<?php
 	session_start();
 	if (!isset($_SESSION['uname'])) {
 		header("location: login.php");
 	}
?>
<!DOCTYPE html>
 <html>
 <head>
 	<title>Cancel</title>
 	</head>
 <body>
<h1 align="center">Cancel Booking</h1>
<table border="1" align="center">
<tr>
	<td align="center">Hotel Name</td>
	<td>User Name</td>
	<td>Cancel Status</td>

</tr>

<tr>
	<td>Acqualina Resort</td>
	<td>Jeffrey</td>
	<td><a href="reserve.php"><input type="checkbox" name="Cancel"></a></td>



</tr>
<tr>
	<td>Montage Deer Valley</td>
	<td>Donald</td>
	<td><a href="reserve.php"><input type="checkbox" name="Cancel"></a></td>



</tr>
<tr>
	<td>Coast Hotels</td>
	<td>Michael</td>
	<td><a href="reserve.php"><input type="checkbox" name="Cancel"></a></td>



</tr>
<tr>
	<td>Astro Resort</td>
	<td>Milton</td>
	<td><a href="reserve.php"><input type="checkbox" name="Cancel"></a></td>



</tr>

<tr align="right">
	
	<td colspan="3"><a href="reserve.php"><input type="submit" name="submit" value="submit" ></a></td>



</tr>



</table>
</body>
</html> 	