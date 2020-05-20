<?php
 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
  require_once('../../service/functions.php');
  $result = grocery();
  $Serial=0;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Grocery</title>
</head>

<style media="screen">
.button {
background-color: #000000; /* Green */
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 4px 2px;
cursor: pointer;
border-radius: 2rem;
}

.black {background-color: #000000;} /* Red */
.black:hover{
  color: #000000;
  background-color: white;
  font-style: oblique;
  border: 2px solid #000000;
  font-size: 18px;
}
.searchInput{
  padding: 12px;
  font-size: 17px;
  border-radius: 2rem;
  border:2px solid black;
  text-align: center;
}
p{
  text-align: center;
}

</style>
<body>

	<table align="center">
		<tr>
			<td><a href="chef.php"><img src="pic/back.png" width="40px" height="40px"></a></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td><h1>Grocery list</h1></td>
			<td><img src="pic/logo.png" alt="logo" width="50px" height="50px"></td>
			<td  align="right"><a href="chef.php"><img src="pic/home.png" width="50px" height="50px" align="center"></a></td>
		</tr>
	</table>
	<hr>
	<hr>

	<table align="center">
		<tr>
			<td><input class="searchInput" id="srh" type="text" name="item" onkeyup="search()" placeholder="SEARCH HERE" size="40"></td>
		</tr>
	</table>
  <br>

  	<table width="60%" align="center">
  		<tr id="test"><td width="10%" align="center"><h2>Serial</h2></td>
  			<td width="30%"><h2 align="center">Grocery Item Name</h2></td>
  			<td width="20%"><h2 align="center">Quantity</h2></td>
  		</tr>
    </table>

        <table width="60%" align="center" id="result" >
        <?php	while($row = mysqli_fetch_assoc($result)){ ?>
            <?php $GLOBALS['Serial']++;?>

        		<tr><td width="10%" align="center"><?= $GLOBALS['Serial'] ?></td>
        			<td width="30%" align="center"><?=$row['grocery_name']  ?></td>
        			<td width="20%" align="center"><?=$row['ava_quantity']  ?>KG</td>
        		</tr>
        <?php } ?>
        	</table>

	<hr>
	<hr>
	<br>

	<table align="center">
		<tr>
			<td colspan="2"><a href="ordergrocery.php"><img src="pic/grocery.png" width="80px" height="80px" alt="grocery pic"></a></td>
			<td><a href="ordergrocery.php"><button class="button black">ORDER GROCERY</button></a></td>
		</tr>
	</table>


<script type="text/javascript">

  function search(){
        var search = document.getElementById("srh").value;
    			var xhttp = new XMLHttpRequest();

    			xhttp.onreadystatechange = function() {
    			    if (this.readyState == 4 && this.status == 200){
    			    	document.getElementById('result').innerHTML = this.responseText;
    			    }
    			};

    			xhttp.open("GET", "../../php/chef/grocerySearch.php?key="+search, true);
    			xhttp.send();
  }

</script>
</body>
</html>
