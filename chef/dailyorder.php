<?php
 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
  require_once('../../service/functions.php');
  //finding user id by $_SESSION['user']
  $result = getAllDailyOrder();
  $flag=0;
  $d = date("Y-m-d");
  echo $d;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Daily Order</title>
</head>
<body>
	<table align="center">
		<tr>
			<td><a href="order.php"><img src="pic/back.png" width="40px" height="40px"></a></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td><h1>Daily Top Ordered List</h1></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td  align="right"><a href="chef.php"><img src="pic/home.png" width="50px" height="50px" align="center"></a></td>
		</tr>
	</table>
	<hr>
	<hr>

	<table width="80%" align="center">
		<tr>
			<td align="center"><h2>Serial</h2></td>
			<td align="center"><h2>Item Name</h2></td>
			<td align="center"><h2>Item Quantity</h2></td>
		</tr>

    <?php	while($row = mysqli_fetch_assoc($result)){ ?>
      <?php if($row['Date']==date("Y-m-d")){ ?>
        		<tr>
        			<td align="center"><?=$row['serial_id']?></td>

              <?php $itemName['item']=item($row['item_id']) ?>

        			<td align="center"><?=$itemName['item']['item_name']?></td>
        			<td align="center"><?=$row['quantity']?></td>
        		</tr>
            <?php $GLOBALS['flag']=1; ?>
        <?php } ?>
		<?php } ?>

      <?php if($GLOBALS['flag']!=1) {?>
        <tr>
          <td><br /><br /><br /><br /><br /></td>
        </tr>
        <tr>
          <td colspan="3" align="center"><h1>No Order Yet</h1></td>
        </tr>
      <?php } ?>

	</table>



</body>
</html>
