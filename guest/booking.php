<?php
 	session_start();
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
  require_once("../../service/functions.php");

  $result = HotelsAll();


?>
<!DOCTYPE html>
 <html>
 <head>
 	<title>Booking</title>
 	</head>
 <body>

  <h1 align="center">For Booking Hotels</h1>
<hr>
<br>
<table border="1" align="center">
<tr>
	<td align="center">Hotel Names</td>
	<td align="center">Available Rooms</td>
	<td align="center">Rates</td>
	<td>Confirm</td>
</tr>


  <?php while ($row=mysqli_fetch_assoc($result)) { ?>
    <?php $hid= $row['hotel_id']  ?>
    <?php $aroom= roomavailableGuest($hid); ?>
    <?php if ($aroom['available']==1) { ?>
        <tr>
          <td align="center"><?=$row['hotel_name'] ?></td>
          <td align="center">available</td>
          <td><?= $aroom['room_rate'] ?></td>
          <td align="center"><a href="payment.php?name=<?=$row['hotel_name']?>&price=<?=$aroom['room_rate'] ?>&hid=<?=$hid?>&rid=<?=$aroom['room_id']?>"><input type="button"  name="" value="Confirm"></a></td>
        </tr>
  <?php } else{?>
            <tr>
              <td align="center"><?=$row['hotel_name'] ?></td>
              <td align="center">Not available</td>
              <td align="center"><?= $aroom['room_rate'] ?></td>
              <td align="center"><a href="payment.php"><input type="button"  name="" value="Confirm"></a></td>
            </tr>
      <?php  }?>
<?php } ?>


</table>
<h3 align="center"><a href="reserve.php"><input type="button" name="back page" value="Back Page"></a></h3>

</body>
</html>
