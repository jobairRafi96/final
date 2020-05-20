<?php	
	session_start();
	include('../../service/functions.php');

	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}

	$_SESSION['manager'] = getManagerInfo($_SESSION['user']['user_id']);             //manager SESSION created
	$_SESSION['hotel'] = getHotelInfo($_SESSION['manager']['manager_id']);           //hotel SESSION created


/*	if(!isset($_COOKIE['usernameMan'])){  
		header("location: manager_login.php");
	} */

?>

<!DOCTYPE html>
<html>
<head>
	<title>Manager Homepage</title>
</head>
<body>
		<form action="validation.php" method="POST">
			<fieldset style="width:100%">
				<table border="0" align="center" align="center" cellspacing="20" cellpadding=”10″>
					<tr>
						<td colspan="5" align="center">
						<hr>Manager Homepage<hr>
						<h3>Welcome <?= $_SESSION['manager']['manager_name']?>!</h3>
						</td>
					</tr>
					<tr>
						<td colspan="5">
							Guest Menu
							<ul>
							  <li><a href="guest_list.php">View Guest List</a></br></li>
							  <li><a href="guest_to_vip.php">Make a Guest VIP</a></br></li>
							  <li><a href="guest_comp.php">View Guest Complaints & Queries</a></br></li>
							  <li><a href="guest_service_req.php">Service Requests</a></br></li>
							  <li><a href="guest_search_alter.php">Search & Alter Guest Information</a></br></li>
							</ul>
						</td>

					</tr>
					<tr>
						<td colspan="10">
							General Menu
							<ul>
							  <li><a href="checkon_room.php">Check on Rooms</a></br></li>
							  <li><a href="withdraw_paym.php">Withdraw Payment</a></br></li>
							  <li><a href="manager_upinfo.php">Update My Information </a></br></li>
							  <li><a href="contact_admin.php">Contact Admin</a></br></li>
							</ul>
						</td>
					</tr>
					<tr>
						<td colspan="10">
							Staff Menu
							<ul>
							  <li><a href="chef_list.php">View Chef List</a></br></li>
							  <li><a href="chef_add.php">Add New Chef</a></br></li>
							  <li><a href="chef_remove.php">Remove Chef </a></br></li>
							  <li><a href="chef_grocery_order.php">Checkout Chef's Grocery Order</a></br></li>
							</ul>
						</td>
					</tr>
					
					<tr>
						<td colspan="10" align="center">
							<a href="../../php/manager_logout.php">Logout</a></br>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
</body>
</html>