<?php	
	session_start();
	require('../../service/db.php');

	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}


	if(isset($_REQUEST['alter']))
    {
       	$guestId = $_POST['guestId'];
		$username = $_POST['username'];
		$paytype = $_POST['paytype'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$dob = $_POST['dob'];
		$phoneNo = $_POST['phoneNo'];

		$con = getConnection();
		$sql = "UPDATE guestpi SET name='{$username}', email='{$email}', address='{$address}', dob='{$dob}', phone_no='{$phoneNo}', payment_type='{$paytype}' WHERE guest_id='{$guestId}'";
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
	<title>Alter Guest Information</title>
</head>
<body>
		<form action="" method="POST">
			<fieldset style="width:100%">
				<table border="0" align="center" align="center" cellspacing="20" cellpadding=”10″>
				<legend>Alter Guest Information</legend>
					<tr>
						<td colspan="3">
							Search By Guest Name: 
							<input type="text" id="term" name="term" onkeyup="abc()" value="">
							<input type="button" name="gName_search" value="Search" onclick="abc()">
							</br>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<div id="result"></div><hr>
						</td>
					</tr>
					
					<tr>
						<td>Guest ID</td>
						<td></td>
						<td align="right"><input type="text" id="guestId" name="guestId" value=""></td>
					</tr>

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
						<td>Payment Type:</td>
						<td></td>
						<td align="right"><input type="paytype" name="paytype" id="paytype" required></td>
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




	<script type="text/javascript">

		/*function Alter(){
			var response = "";

			var xhttp = new XMLHttpRequest();				
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200){

			    	document.getElementById('result').innerHTML = this.responseText;
			    	response = this.responseText; 
			    	alert(response);

			    }
			};
			
			xhttp.open("POST", "../../service/ajaxGuestAlter.php", true); 
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send();			 
		}*/
		
		function abc(){
			var search = document.getElementById("term").value;
			var xhttp = new XMLHttpRequest();	
			
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200){
			    	document.getElementById('result').innerHTML = this.responseText;
			    }
			};
			
			xhttp.open("GET", "../../service/ajaxGuestAlter.php?key="+search, true);
			xhttp.send(); 
		}
	</script>

</body>
</html>