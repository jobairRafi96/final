<?php
 	session_start();
//if session was destroy in log out page we need to do login again.
//$_SESSION['uname'] means email in user table.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
  require_once('../../service/functions.php');
  $userId=$_SESSION['user']['user_id'];
   $result = chefpi($userId);
   $_SESSION['chefpi']=$result;
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

		<!-- heading and logo -->
	<table align="center">
		<tr>
			<td align="left"><a href="logout.php"><img src="pic/logout1.png" width="50px" height="50px" align="center"></a></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td><h1>Chef's Corner</h1></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>

			<td  align="right"><a href="chef.php"><img src="pic/home.png" width="50px" height="50px" align="center"></a></td>
		</tr>
    <tr>
      <td colspan="5" align="center"><?php if ($_SESSION['chefpi']['profile_pic']==""){ ?>
        <img src="pic/p.png" width="50px" height="50px" alt="profile pic" align="center">
        <?php } else{ ?>
      <img src="upload/<?=$_SESSION['chefpi']['profile_pic']?>" width="50px" height="50px" alt="profile pic" align="center">
      <?php } ?></td>
    </tr>
		<tr>
			<td colspan="5" align="center"><h4 align="center"><a href="profile.php">Profile</a></h4></td>
		</tr>
	</table>
	<hr>
	<hr>


	<!-- orders from user -->
	<table align="center">
		<tr>
			<td colspan="2"></td>
			<td ><a href="order.php"><img src="pic/orders.png" width="100px" height="100px"></a></td>
			<td align="right"><a href="order.php"><h2>Order list</h2></a></td>
			<td colspan="2"></td>
		</tr>
		<tr>
		    <td><br /></td>
		</tr>

		<tr>
			<td><a href="menu.php"><h2>Menu</h2></a></td>
			<td><a href="menu.php"><img align="left" src="pic/menu.jfif" width="100px" height="100px"></a></td>
			<td colspan="2"></td>
			<td><a href="grocery.php"><img align="right" src="pic/grocery.png" width="100px" height="100px"></a></td>
			<td><a href="grocery.php"><h2>Grocery</h2></a></td>
		</tr>



		<tr>
			<td ><a href="service.php"><h2>Service</h2></a></td>
			<td ><a href="service.php"><img align="left" src="pic/service.png" width="95px" height="95px"></a></td>
			<td colspan="2"></td>
			<td><a href="review.php"><img align="right" src="pic/review.png" width="100px" height="100px"></a></td>
			<td><a href="review.php"><h2>Reviews</h2></a></td>
		</tr>

    <tr>
		    <td><br /></td>
		</tr>

		<tr>
			<td colspan="2"></td>
			<td><a href="payment.php"><img align="right" src="pic/payment.png" width="90px" height="90px"></td>
			<td><a href="payment.php"><h2>Withdraw<br>Payment</h2></td>
			<td colspan="2"></td>

		</tr>

	</table>

</body>
</html>
