<?php
 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
  require_once('../../service/functions.php');
  $mid = $_GET['Id'];
  $Serial=0;
  $result = getAllitem();

?>

<!DOCTYPE html>
<html>
<head>
	<title>menudetails</title>
</head>
<style media="screen">
      .button {
      background-color: #85a392; /* Green */
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
        color: #85a392;
        background-color: white;
        font-style: oblique;
        border: 5px solid #85a392;
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

      .black {background-color: #000000;} /* Red */
      .black:hover{
        color: #000000;
        background-color: white;
        font-style: oblique;
        border: 5px solid #000000;
        font-size: 18px;
      }

</style>



<body>
		<table align="center">

		<tr>
			<td><a href="menu.php"><img src="pic/back.png" width="40px" height="40px"></a></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td><h1>Menu Details</h1></td>
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
			<td align="center"><h2>Item price</h2></td>
			<td><h2 align="center">Delete</h2></td>
			<td></td>
		</tr>


  <?php	while($row = mysqli_fetch_assoc($result)){ ?>
    <?php if ($row['menu_id']==$mid) {?>
      <?php $GLOBALS['Serial']++;?>
		<tr>
			<td align="center"><?= $GLOBALS['Serial']?></td>
			<td align="center"><?= $row['item_name']?></td>
			<td align="center"><?= $row['price']?></td>

			<td width="10%" align="center"><a href="../../php/chef/itemDlt.php?name=<?=$row['item_name']?>&Id=<?=$row['menu_id']?>">
        <button class="button red">Click</button></a>
				</td>

        <td width="10%" align="center"><a href="edititem.php?name=<?=$row['item_name']?>&Id=<?=$row['menu_id']?>">
          <button class="button">EDIT</button></a>
        </td>
		</tr>
  <?php } ?>
<?php } ?>
		<tr>

		<tr>
			<td colspan="5"></td>
		</tr>


		<tr>
			<td colspan="5" align="center"><a href="additem.php?Id=<?=$mid ?>">
        <button class="button black">ADD ITEM</button></a>
      </td>
		</tr>



</body>
</html>
