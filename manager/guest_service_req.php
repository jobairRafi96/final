<?php	
	session_start();
	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}

	require_once('../../service/functions.php');
	$result = getServiceList();                          //gets unchecked service requests

?>


<!DOCTYPE html>
<html>
<head>
	<title>Service Requests</title>
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
						<h3>Service Requests</h3>
						</td>
					</tr>
					<tr>
						<td>Service Request ID</td>
						<td>User Type</td>
						<td>Name</td>
						<td>Requested Service</td>
						<td>Waiting for Review</td>
					</tr>

					<?php	
						while($row = mysqli_fetch_assoc($result)){ 
							$user = getUserDataById($row['reqby_user']);

							if($user['type'] == "guest"){
								$userDataByType = getGuestDataByUserId($row['reqby_user']);
							}elseif ($user['type'] == "chef") {
								$userDataByType = getChefDataByUserId($row['reqby_user']);
							}
							

					?>
		
					<tr>
						<td><?=$row['service_id']?></td>
						<td><?=$user['type']?></td>
						<td><?=$userDataByType['name']?></td>
						<td><?=$row['service_name']?></td>
						
						<td>
							<button class="button button2" onclick="checkedService(<?=$row['service_id']?>); reload();">Check</button>
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
					alert("please reload.");
					window.location.reload(true);
				}

				function checkedService(service_id){
					var id = service_id;
					var response = "";
					alert("Service ID: "+id+" Check");

					var xhttp = new XMLHttpRequest();	
					xhttp.onreadystatechange = function() {
					    if (this.readyState == 4 && this.status == 200){

					    	response = this.responseText;
					    	alert(response);

					    }
					};
					
					xhttp.open("POST", "../../service/ajaxCheckService.php", true); 
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.send("id="+id);

				}

		</script>


</body>
</html>