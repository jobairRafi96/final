<?php
 	session_start();
//if session was destroy in log out page we need to do login again.
// TODO: login is done but not properly complete

// TODO: email must be unique when register;
// TODO: for work this code of mine the todos needed to be done;
//// TODO: cookie and layered;
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
  $username = $_SESSION['uname'];
  require_once('../../service/functions.php');
  //finding user id by $_SESSION['user']

 $userId=$_SESSION['user']['user_id'];

  $result = chefpi($userId);
  $_SESSION['chefpi']=$result;

  //for manager name;
  $result1 = chefpiTomng($_SESSION['chefpi']['manager_id']);
  $_SESSION['managerpi']=$result1;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<style media="screen">
.button {
background-color: white; /* white */
border: none;
color: white;
padding: 10px 28px;
text-align: center;
display: inline-block;
cursor: pointer;
border-radius: 2rem;
margin-top: 10px;
}

.grey {background-color: #85a392;} /* edit */
.grey:hover{
  color: #85a392;
  background-color: white;
  font-style: oblique;
  border: 2px solid #85a392;
}

</style>
<body>

	<table align="center">
		<tr>
			<td><a href="chef.php"><img src="pic/back.png" width="40px" height="40px"></a></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td><h1>Profile</h1></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td  align="right"><a href="chef.php"><img src="pic/home.png" width="50px" height="50px" align="center"></a></td>
		</tr>
	</table>
	<hr>
	<hr>

<fieldset>
	<legend>Profile</legend>
	<table align="center">

		<tr>
			<td>Profile Pic</td>
			<td>:</td>
			<td>
        <?php if ($_SESSION['chefpi']['profile_pic']==""){ ?>
          <img src="pic/p.png" width="50px" height="50px" alt="profile pic" align="center">
          <?php } else{ ?>
				<img src="upload/<?=$_SESSION['chefpi']['profile_pic']?>" width="50px" height="50px" alt="profile pic" align="center">
        <?php } ?>
			</td>
		</tr>



		<tr>
			<td>Chef Name</td>
			<td>:</td>
			<!-- use chef name by session -->
			<td><?php echo $_SESSION['chefpi']['name']; ?></td>
		</tr>



		<tr>
			<td>Email</td>
			<td>:</td>
			<td>
				<?php echo $_SESSION['chefpi']['email']; ?>
			</td>
		</tr>

    <tr>
      <td>DOB</td>
      <td>:</td>
      <td>
        <?php echo $_SESSION['chefpi']['dob']; ?>
      </td>
    </tr>

    <tr>
      <td>address</td>
      <td>:</td>
      <td>
        <?php echo $_SESSION['chefpi']['address'] ?>
      </td>
    </tr>

    <tr>
      <td>Phone</td>
      <td>:</td>
      <td>

        <?php echo $_SESSION['chefpi']['phone_no'] ?>
      </td>
    </tr>

    <tr>
      <td>Work Under</td>
      <td>:</td>
      <td>
        <?php echo $_SESSION['managerpi']['manager_name']; ?>
      </td>
    </tr>


		<tr>
			<td>Tip Amount</td>
			<td>:</td>

			<td><?php echo $_SESSION['chefpi']['tip_amount']; ?>TK</td>
		</tr>


		<tr>
			<td colspan="3" align="center"><a href="editprofile.php"><input class="grey button" type="button" name="submit" value="Edit"></a></td>
		</tr>

	</table>

</body>
</html>
