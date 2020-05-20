<?php	
	session_start();
	include('../../service/functions.php');
	//require('../../service/db.php');

	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}

	if(isset($_REQUEST['remove']))
    {
    	$chef_id = $_POST['chef_id'];
    	$success = deleteChefAndUser($chef_id);


		if($success){
			$alert = "<script>
	        alert('Delete Successful.');
	        </script>";
	        echo $alert;
		}else{
			$alert = "<script>
	        alert('Delete failed!');
	        </script>";
	        echo $alert;
		}
    }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Remove Chef</title>
</head>
<body>
		<form action="" method="POST">
			<fieldset style="width:100%">
			<legend>Remove Chef</legend>
				<table border="0" align="center" align="center" cellspacing="20" cellpadding=”10″>
					<tr>
						<td colspan="2" align="center">

						</td>
					</tr>
					<tr>
						<td>Chef ID: </td>
						<td><input type="num" name="chef_id" required></td>
					</tr>
		
					<tr>
						<td></td>
						<td align="right"><input type="submit" name="remove" value="Remove"></td>
					</tr>
					
					<tr>
						<td colspan="2" align="center">
							<hr><a href="manager_home.php">Home Page</a></br>
						</td>
					</tr>
				</table>
			</fieldset> 

		</form>

</body>
</html>