<?php
 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: login.php");
 	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
</head>
<body>

		<table align="center">
		<tr>
			<td><a href="chef.php"><img src="pic/back.png" width="40px" height="40px"></a></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td><h1>MENU</h1></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td  align="right"><a href="chef.php"><img src="pic/home.png" width="50px" height="50px" align="center"></a></td>
		</tr>
	</table>
	<hr>
	<hr>
	<br>


	<table width="70%" align="center">



		<tr>
			<td align="center"><a href="menudetails.php?Id=1"><img src="pic/menu1.jpg" width="100px" height="200px"></a></td>
			<td align="center"><a href="menudetails.php?Id=2"><img src="pic/menu2.jpg" width="100px" height="200px"></a></td>
			<td align="center"><a href="menudetails.php?Id=3"><img src="pic/menu3.jpg" width="100px" height="200px"></a></td>
		</tr>
		<tr>
			<td><h2 align="center"><a href="menudetails.php?Id=1">Breackfast</a></h2></td>
			<td><h2 align="center"><a href="menudetails.php?Id=2">Lunch</a></h2></td>
			<td><h2 align="center"><a href="menudetails.php?Id=3">Dinner</a></h2></td>
		</tr>

		<tr>
			<td align="center"><a href="menudetails.php?Id=4"><img src="pic/appetizer.jpg" width="100px" height="200px"></a></td>
			<td align="center"><a href="menudetails.php?Id=5"><img src="pic/drinks.jpg" width="100px" height="200px"></a></td>
			<td align="center"><a href="menudetails.php?Id=6"><img src="pic/mainfood.jfif" width="100px" height="200px"></a></td>
		</tr>
		<tr>
			<td><h2 align="center"><a href="menudetails.php?Id=4">Appetizer</a></h2></td>
			<td><h2 align="center"><a href="menudetails.php?Id=5">Drinks</a></h2></td>
			<td><h2 align="center"><a href="menudetails.php?Id=6">Mainfood</a></h2></td>
		</tr>

	</table>

</body>
</html>
