<?php
	
	//require_once('db.php');


	if(isset($_GET['key'])){
		$search = $_GET['key'];

		$con = mysqli_connect('127.0.0.1', 'root', '', 'hms');
		$sql = "select * from guestpi where name like '%{$search}%'";
		$result = mysqli_query($con, $sql);
		$count =mysqli_num_rows($result);

		if($count > 0){

			$data = "<table border=1>
					<tr>
						<td>GusetID</td>
						<td>NAME</td>
						<td>Email</td>
						<td>Address</td>
						<td>Date of Birth</td>
						<td>Phone No</td>
						<td>Payment Type</td>
					</tr>";

			while($row = mysqli_fetch_assoc($result)){
				$data .= "<tr>
						<td>{$row['guest_id']}</td>
						<td>{$row['name']}</td>
						<td>{$row['email']}</td>
						<td>{$row['address']}</td>
						<td>{$row['dob']}</td>
						<td>{$row['phone_no']}</td>
						<td>{$row['payment_type']}</td>
				</tr>";
			}

			$data .= "</table>";
			echo $data;

		}else{
			echo "No result found!";
		}
	}


	if(isset($_REQUEST['alter'])){

		$guestId = $_POST['guestId'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$dob = $_POST['dob'];
		$phoneNo = $_POST['phoneNo'];

/*		$con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
		$sql = "insert into users values('','{$username}','{$password}','{$email}', '{$type}')";
		
		if(mysqli_query($con, $sql)){
			echo "Registration done!";
		}else{
			echo "Error";
		}*/

		echo $phoneNo;
	}
	
?>