<?php
 	session_start();
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}

  require_once("../../service/functions.php");
  $uid=$_SESSION['user']['user_id'];
  $gid=guestGuest($uid);
 $result = bookedGuest($gid['guest_id']);
 $check=0;
?>
<!DOCTYPE html>
 <html>
 <head>
 	<title>Booked Hotels</title>
 	</head>
 <body>

<h1 align="center">Booked Hotels</h1>
<br>
  <table border="1" align="center">
        <tr>
        	<td align="center">Hotel Names</td>
        	<td align="center">Room tag</td>
        	<td>Cancel</td>
        </tr>

  <?php while ($row=mysqli_fetch_assoc($result)) { ?>
    <?php $hid= $row['hotel_id']; ?>

    <?php $hotelName=HotelsAllGuest($hid); ?>
    <?php $aroom= roomavailableGuest($hid); ?>
        <tr>
        	<td><?=$hotelName['hotel_name'] ?></td>
        	<td><?=$aroom['tag_id']; ?></td>
          <td align="center"><a href="../../php/bookingDlt.php?bid=<?=$row['booking_id']; ?>">
            <input type="submit"  name="submit" value="Cancel"></td></a>
        </tr>

  <?php } ?>

  </table>

<br>
<br>
<center>




<?php  ?>
<?php


 ?>

  <table border="1" align="center">
  	<tr><td align="center" colspan="2"><h1 align="center">Room Services</h1></td>
  	<tr>
  		<td align="center">Catagory</td>
  		<td align="center">Confirm</td>
  	</tr>

    <form  action="../../php/serviceAdd.php" method="post">
      <tr>
  		<td>Room Clean</td>
  		<td align="center"><button type="submit" name="service" value="Room Clean">Confirm</button></td>
  	   </tr>
    </form>

    <form  action="../../php/serviceAdd.php" method="post">
        <tr>
    		<td align="center">Cloth</td>
    		<td align="center"><button type="submit" name="service" value="Cloth">Confirm</button></td>
    	   </tr>
    </form>

    <form  action="../../php/serviceAdd.php" method="post">
  	<tr>
  		<td>Call Service Boy</td>
  		<td align="center"><button type="submit" name="service" value="Call Service Boy">Confirm</button></td>
  	</tr>
    </form>
  </table>




</form>

</center>
<h3 align="center"><a href="reserve.php"><input type="button" name="back page" value="Back Page"></a></h3>

</body>
</html>
