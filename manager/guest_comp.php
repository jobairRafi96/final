<?php	
	session_start();
	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}
	/*if(!isset($_COOKIE['usernameMan'])){  
		header("location: manager_login.php");
	}*/ 

	require_once('../../service/functions.php');
	$result = getComplainList();
	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Guest Complaints & Queries</title>
	<style>
		.button {
		  border: none;
		  color: white;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		  margin: 4px 2px;
		  cursor: pointer;
		}

		.button1 {background-color: #4CAF50;} /* Green */
		.button2 {background-color: #008CBA;} /* Blue */
	</style>
</head>
<body>
		<form>
			<fieldset style="width:100%">
				<table border="0" align="center" align="center" cellspacing="20" cellpadding=”10″>
					<tr>
						<td colspan="5" align="center">
							<h3>Complaints & Queries</h3>
						</td>
					</tr>
					<tr>
						<td>Complain ID</td>
						<td>Guest ID </td>
						<td>Guest Name</td>
						<td>Message</td>
						<td>Waiting for Review</td>
					</tr>

					<?php	
						while($row = mysqli_fetch_assoc($result)){ 
							$guest = getGuestDataByGuestId($row['guest_id']);

					?>
		
					<tr>
						<td><?=$row['complain_id']?></td>
						<td><?=$row['guest_id']?></td>
						<td><?=$guest['name']?></td>
						<td><?=$row['complain_msg']?></td>
						
						<td>
							<button class="button button2" onclick="checkedComplain(<?=$row['complain_id']?>); reload();">Check</button>
						</td>
					</tr>
				
					<?php } ?>

					<tr>
						<td colspan="5" align="center">
							<a href="manager_home.php">Goto Homepage</a></br>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>

	
	<script type="text/javascript">

			function reload(){
				window.location.reload(true);
			}

			function checkedComplain(complain_id){
				var id = complain_id;
				var response = "";
				alert("Complain ID: "+id+" Check");

				var xhttp = new XMLHttpRequest();	
				xhttp.onreadystatechange = function() {
				    if (this.readyState == 4 && this.status == 200){

				    	response = this.responseText;
				    	alert(response);
				    }
				};
				
				xhttp.open("POST", "../../service/ajaxCheckComplain.php", true); 
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("id="+id);
			}

	</script>
</body>
</html>