<?php
 	session_start();
 	if (!isset($_SESSION['uname'])) {
 		header("location: Login.php");
 	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>After Discount</title>
</head>
<body>
	<h1 align="center">After Discount</h1>
</body>
</html>

