<?php	
	session_start();
	//require('../../service/db.php');
	
	if(!isset($_SESSION['user'])){  
		header("location: ../../index.html");
	}

	require_once('../../service/functions.php');
	$result = getGroceryList();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Grocery Order List</title>
</head>
<body>
		<form>
			<fieldset style="width:100%">
				<table border="0" align="center" align="center" cellspacing="20" cellpadding=”10″>
					<tr>
						<td colspan="6" align="center">
							<h3>Grocery Order List</h3>
						</td>
					</tr>
					<tr>
						<td>Order ID</td>
						<td>Grocery Name </td>
						<td>Avaiable Qty</td>
						<td>Requested Qty</td>
						<td>BY Chef ID</td>
						<td>Review</td>
					</tr>

					<?php	
						while($row = mysqli_fetch_assoc($result)){ 

					?>
		
					<tr>
						<td><?=$row['grocery_orderid']?></td>
						<td><?=$row['grocery_name']?></td>
						<td><?=$row['ava_quantity']?></td>
						<td><?=$row['req_quantity']?></td>
						<td><?=$row['chef_id']?></td>
						
						<td>
							<button class="button button2" onclick="checkedGrocery(<?=$row['grocery_orderid']?>); reload();">Check</button>
						</td>
					</tr>
				
					<?php } ?>

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
				window.location.reload(true);
			}

			function checkedGrocery(grocery_orderid){
				var id = grocery_orderid;
				var response = "";
				alert("Complain ID: "+id+" Check");

				var xhttp = new XMLHttpRequest();	
				xhttp.onreadystatechange = function() {
				    if (this.readyState == 4 && this.status == 200){

				    	response = this.responseText;
				    	alert(response);
				    }
				};
				
				xhttp.open("POST", "../../service/ajaxCheckGrocery.php", true); 
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("id="+id);
			}

	</script>

</body>
</html>