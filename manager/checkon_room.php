<?php	
	session_start();
	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}

	require_once('../../service/functions.php');
	$result = getRoomsNotAvailable($_SESSION['hotel']['hotel_id']);  
	$vacantRooms = getVacantRooms($_SESSION['hotel']['hotel_id']);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Check on Rooms</title>
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
			<fieldset style="width:100%" align="center">
				<legend>Event & Bookings</legend>
					<table border="0" align="center" cellspacing="20" cellpadding=”10″>
						<tr>
							<td colspan="6" align="center">
							<h3>Booked Rooms</h3>
							</td>
						</tr>
						<tr>
							<td>Room ID</td>
							<td>Tag ID</td>
							<td>Floor Number</td>
							<td>Room Type</td>
							<td>Rate</td>
							<td>Review</td>
						</tr>

						<?php	
							while($row = mysqli_fetch_assoc($result)){ 
								
						?>
			
						<tr>
							<td><?=$row['room_id']?></td>
							<td><?=$row['tag_id']?></td>
							<td><?=$row['floor_num']?></td>
							<td><?=$row['room_type']?></td>
							<td><?=$row['room_rate']?></td>
							
							<td>
								<button class="button button1" onclick="checkedRoom(<?=$row['room_id']?>); reload();">Check</button>
							</td>
						</tr>
					
						<?php } ?>

						<tr></tr>
						<tr>
							<td>
								<b>Vacant Rooms:</b>
							</td>
							<td colspan="5" align="left">
								<?php	
									while($tag = mysqli_fetch_assoc($vacantRooms)){ 
										echo $tag['tag_id'].", "; 
									}
								?>
							</td>
						</tr>
						<tr>
							<td colspan="6" align="center">
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

				function checkedRoom(room_id){
					var id = room_id;
					var response = "";
					alert("Room ID: "+id+" Check");

					var xhttp = new XMLHttpRequest();	
					xhttp.onreadystatechange = function() {
					    if (this.readyState == 4 && this.status == 200){

					    	response = this.responseText;
					    	alert(response);

					    }
					};
					
					xhttp.open("POST", "../../service/ajaxCheckRoom.php", true); 
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.send("id="+id);

				}

		</script>
</body>
</html>