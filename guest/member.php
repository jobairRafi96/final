<?php
 	session_start();
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
?>
<!DOCTYPE html>
 <html>
 <head>
 	<title>Vip Membership</title>
 	</head>
 <body>
 	<center>
 	<fieldset style="width: 500px">

<table border="1" align="center">
  <tr><td align="center" colspan="2"><h1 align="center">Vip Membership</h1></td>
  <tr>
    <td align="center">Catagory</td>
    <td align="center">Confirm</td>
  </tr>

  <form  action="../../php/vipRequest.php" method="post">
    <tr>
    <td>Platinum</td>
    <td align="center"><button type="submit" name="req" value="Genarel">Confirm</button></td>
     </tr>
  </form>

  <form  action="../../php/vipRequest.php" method="post">
      <tr>
      <td>Gold</td>
      <td align="center"><button type="submit" name="req" value="VIP">Confirm</button></td>
       </tr>
  </form>

</table>
</fieldset>
</center>
 </body>
 </html>
