<?php	
	session_start();
	require_once('../../service/functions.php');

	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}

	$admin = getAdminInfo();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Contact Admin</title>
</head>
<body>
		<form>
			<fieldset style="width:100%" align="center">
				<legend>Contact Admin</legend>
				<img src="<?php echo "../admin/".$admin['profile_pic']; ?>" alt="admin pic" width="250" height="300">
				</br>
				<b>Phone Number: </b><?=$admin['phone_no']?>
				</br>
				<b>Email: </b><?=$admin['email']?>
				</br></br><hr>
				<a href="manager_home.php">Homepage</a></br>
			</fieldset>
		</form>
</body>
</html>