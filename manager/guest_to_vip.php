<?php	
	session_start();

	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Change Guest Status</title>
</head>
<body>
	<form>
		<fieldset style="width:100%" align="center">
			<legend>Change Guest Status</legend>

			<table border="0" align="center" cellspacing="20" cellpadding=”10″>
				<tr>
					<td>Select Guest ID</td>
					<td>Guest Name</td>
				</tr>

				<tr>
					<td><input type="number" name="guestId" id="guestId" value="" size="3" onkeyup="getName()"></td>
					<td><h4 id="gName"></h4></td>
				</tr>
				<tr><td colspan="2"><hr></td></tr>
				<tr>
					<td align="center">Status</td>
					<td><h4 id="success"></h4></td>
				</tr>
				
				<tr>
					<td>
						<input type="radio" id="general" name="statusType" value="general">General 
						<input type="radio" id="vip" name="statusType" value="vip">VIP</br>
					</td>
					<td>
						<input type="button" name="changeGStat" value="Change" onclick="changeStatusType()">
					</td>
				</tr>

				<tr><td colspan="2"><hr></br></td></tr>
				<tr>
					</br><td colspan="2" align="center"><a href="manager_home.php">Back to Homepage</a></td>
				</tr>
			</table>
		</fieldset>
	</form>

	<script type="text/javascript">

		var validGuestId = false;
		
		function changeStatusType(){
			if(validGuestId){
				var guestId = document.getElementById("guestId").value;
			}


			if (document.getElementById('general').checked) {
 				var status = document.getElementById('general').value;
			}else if(document.getElementById('vip').checked){
				var status = document.getElementById('vip').value;
			}else{
				var status = "";
				alert("Please select guest status.");
			}


			if(status == "general" || status == "vip"){
			var xhttp = new XMLHttpRequest();				
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200){
			    	document.getElementById('success').innerHTML = this.responseText; 


			    }
			};
			
			xhttp.open("POST", "../../service/ajaxChangeGuestStatus.php", true); 
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("guestId="+guestId+"&status="+status);	
			}
			 
		}


		function getName(){
			var guestId = document.getElementById("guestId").value;
			var xhttp = new XMLHttpRequest();	
			
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200){
			    	document.getElementById('gName').innerHTML = this.responseText; 

			    	if(document.getElementById("gName").value == "" || document.getElementById("gName").value == "not found!"){
			    		validGuestId = false;
			    	}else{
			    		validGuestId = true;
			    	}
			    }
			};
			
			xhttp.open("GET", "../../service/ajaxGetName.php?id="+guestId, true);
			xhttp.send(); 
		}
	</script>

</body>
</html>