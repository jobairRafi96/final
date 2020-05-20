<?php
 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}

  require_once('../../service/functions.php');
  //finding user id by $_SESSION['user']
  $result = getAllorder();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Order LIst</title>
</head>

<style media="screen">
      .button {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: .5rem;
      }
      .button:hover{
        color: #4CAF50;
        background-color: white;
        font-style: oblique;
        border: 5px solid #4CAF50;
        font-size: 18px;
      }

      .blue {background-color: #008CBA;} /* Blue */
      .blue:hover{
        color: #008CBA;
        background-color: white;
        font-style: oblique;
        border: 5px solid #008CBA;
        font-size: 18px;
      }
      .red {background-color: #f44336;} /* Red */
      .red:hover{
        color: #f44336;
        background-color: white;
        font-style: oblique;
        border: 5px solid #f44336;
        font-size: 18px;

      }

</style>

<body>

	<table align="center">
		<tr>
			<td><a href="chef.php"><img src="pic/back.png" width="40px" height="40px"></a></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td><h1>Order list</h1></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td  align="right"><a href="chef.php"><img src="pic/home.png" width="50px" height="50px" align="center"></a></td>
		</tr>
	</table>
	<hr>
	<hr>


  <table width="100%">
  		<tr><td width="10%"><h2>Serial</h2></td>
  			<td width="20%"><h2>Guest Name</h2></td>
  			<td width="20%" colspan="2"><h2 align="center">Item name</h2></td>
  			<td width="10%"><h2 align="center">Quantity</h2></td>
  			<td width="10%"><h2 align="center">Complement</h2></td>
  			<td width="10%"><h2 align="center">Cancel</h2></td>
  			<td width="10%"><h2 align="center">Done</h2></td>
  		</tr>

  <?php	while($row = mysqli_fetch_assoc($result)){ ?>

<?php if ($row['order_state']=="") { ?>

  		<tr><td width="10%" class="serial"><?=$row['serial_id']?></td>

        <?php $gName['guestpi']=Guestpi($row['guest_id']) ?>
  			<td width="20%"><?=$gName['guestpi']['name']?></td>

        <?php $itemName['item']=item($row['item_id']) ?>
  			<td width="20%" colspan="2" align="center"><?=$itemName['item']['item_name']?></td>

  			<td width="10%" align="center"><?=$row['quantity']?></td>

  			<td width="10%" align="center">
          <button class="button blue" id="cmpbtnid<?=$row['serial_id']?>" onclick="complement(<?=$row['serial_id']?>)">Click</button></td>

  			<td width="10%" align="center"><a href="../../php/chef/orderDlt.php?Id=<?=$row['serial_id']?>">
          <button class="button red">Click</button></a>
          </td>
          <!-- <button class="button red" id="cnlbtnid<?=$row['serial_id']?>" onclick="cancel(<?=$row['serial_id']?>)">Click</button></td> -->
  				</td>
  			<td width="10%" align="center">
  				<button class="button" id="donebtnid<?=$row['serial_id']?>" onclick="done(<?=$row['serial_id']?>)">Click</button>
  		</tr>
        <?php } ?>
  	<?php } ?>

  	</table>


	<hr>
	<hr>


		<!-- Daily order list -->
	<table align="center">
		<tr>
			<td><a href="dailyorder.php"><img src="pic/daily.png" width="80px" height="80px"></a></td>
			<td><a href="dailyorder.php"><h2>Daily Ordered item</h2></a></td>
		</tr>

	</table>

<!-- cancel and done with button -->


<script type="text/javascript">
function complement(id){

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {

              if (this.readyState == 4 && this.status == 200){
                  elementid= "cmpbtnid"+id;
                  //i can use a css animation.
                  document.getElementById(elementid).innerHTML=this.responseText;
                  document.getElementById(elementid).disabled = true;

              }
          };

          xhttp.open("POST", "../../php/chef/orderComplement.php", true);
    			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    			xhttp.send("Id="+id);
      }


  function cancel(id){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200){
                    elementid= "cnlbtnid"+id;
                    //i can use a css animation.
                    document.getElementById(elementid).innerHTML=this.responseText;
                    document.getElementById(elementid).disabled = true;
                }
            };

            xhttp.open("POST", "../../php/chef/orderDlt.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("Id="+id);
      }

  function done(id){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200){
                    elementid= "donebtnid"+id;
                    //i can use a css animation.
                    document.getElementById(elementid).innerHTML=this.responseText;
                    document.getElementById(elementid).disabled = true;

                }
            };

            xhttp.open("POST", "../../php/chef/orderDone.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("Id="+id);
      }

</script>

</body>
</html>
