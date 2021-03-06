<?php
 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add item</title>
</head>
<style media="screen">
    body{
      margin: 0;
      padding:0;
      box-sizing: border-box;
    }
    .button {
    background-color: white; /* Green */
    border: none;
    color: white;
    padding: 10px 28px;
    text-align: center;
    display: inline-block;
    cursor: pointer;
    border-radius: 2rem;
    }

    .green {background-color: #4CAF50;} /* green */
    .green:hover{
      color: #4CAF50;
      background-color: white;
      font-style: oblique;
      border: 2px solid #4CAF50;
    }
    .black {background-color: #000000;} /* grey */
    .black:hover{
      color: #000000;
      background-color: white;
      font-style: oblique;
      border: 2px solid #000000;
    }

    .gform{
      position: absolute;
      display: flex;
      flex-direction: column;
      align-items: center;
      top: 14vh;
      left: 60vh;
      background-color: white;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      margin: 0;
    }
    .fs{
      padding: 40px 130px 40px;
      border-color: #4CAF50;
    }
</style>
<body>
    <div class="gform">

          <fieldset style="width: 350px" class="fs">
          		<form  method="post" action="../../php/chef/groceryOrder.php"><h3>

          			<table align="center">
          				<tr>
          					<td align="center" colspan="2"><h3>Order Grocery<br> ITEM</h3></td>
          				</tr>

          				<tr>
          					<td> Grocery Item name</td>
          					<tr></tr>
          					<td><input type="text" name="name"  placeholder="name"></td>
          				    <tr></tr>
          					<td>Item Quantity: </td>
          					<tr></tr>
          					<td><input type="number" name="quantity"  placeholder="quantity"></td>
                              <tr></tr>
          					<tr></tr>
          					<td align="center"><input class="green button" type="submit" name="Confirm" value="Confirm"></td>
          					<tr></tr>
          					<td align="center"><a href="grocery.php"><input class="black button" type="button" name="back" value="Back"></a></td>

          					</tr>

          			</table>
          		</form>
          </fieldset>
      </div>

</body>
</html>
