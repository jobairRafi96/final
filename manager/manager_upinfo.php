<?php	
	session_start();
	require('../../service/db.php');
	
	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}


	if(isset($_REQUEST['alter']))
    {
       	$managerId = $_SESSION['manager']['manager_id'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$dob = $_POST['dob'];
		$phoneNo = $_POST['phoneNo'];

		$filename = $_FILES['mypic']['name'];
		$dest = "upload/".$filename;
		$src = $_FILES['mypic']['tmp_name'];

		if(move_uploaded_file($src, $dest)){
			echo "File Uploaded.";
		}else{
			echo "File Upload Error!";
		}




		$con = getConnection();
		$sql = "UPDATE managerpi SET manager_name='{$username}', email='{$email}', address='{$address}', dob='{$dob}', phone_no='{$phoneNo}', profile_pic='{$dest}' WHERE manager_id='{$managerId}'";
		$result = mysqli_query($con, $sql);

		if(mysqli_affected_rows($con)){
			$alert = "<script>
	        alert('Alter Successful.');
	        </script>";
	        echo $alert;
		}else{
			$alert = "<script>
	        alert('Alter failed!');
	        </script>";
	        echo $alert;
		}

		

       $alert = "<script>
       alert('inserted successfully');
       </script>";
       echo $alert;

    }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Update Manager Information</title>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
			<fieldset style="width:100%">
				<table border="0" align="center" align="center" cellspacing="20" cellpadding=”10″>
				<legend>Update My Information</legend>

					<tr>
						<td>Full Name:</td>
						<td></td>
						<td align="right"><input type="text" name="username" id="username" required></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td></td>
						<td align="right"><input type="email" name="email" id="email" required></td>
					</tr>
					
					<tr>
						<td>Address: </td>
						<td></td>
						<td align="right"><input type="text" name="address" id="address" required></td>
					</tr>
					<tr>
						<td>Date of Birth: </td>
						<td></td>
						<td align="right"><input type="date" style="width:167px" name="dob" id="dob" required></td>
					</tr>
					<tr>
						<td>Phone Number: </td>
						<td></td>
						<td align="right"><input type="text" name="phoneNo" id="phn" required></td>
					</tr>
					<tr>
						<td>Profile Picture:</td>
						<td></td>
						<td align="right"><input type="file" name="mypic" required></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td align="right"><input type="submit" name="alter" value="Change"></td>
					</tr>
					<tr>
						<td colspan="3"></td>
					</tr>
					<tr>
						<td colspan="3" align="center">
							<hr><a href="manager_home.php">Back to Homepage</a>	
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
</body>
</html>