<?php
    session_start();
    //if session was destroy in log out page we need to do login again.
    if (!isset($_SESSION['uname'])) {
      header("location: ../../index.html");
    }


require_once('../../service/functions.php');

	$search = $_GET['key'];

	$result = grocerySearch($search);
	$count =mysqli_num_rows($result);
  $Serial=0;
  $_SESSION['pagecontrol']=3;

	if($count > 0){

		$data = "<table width='60%' align='center'>";

		while($row = mysqli_fetch_assoc($result)){
     $GLOBALS['Serial']++;
			$data .= "<tr>
          <td width='10%' align='center'>{$GLOBALS['Serial']}</td>
					<td width='30%' align='center'>{$row['grocery_name']}</td>
					<td width='20%' align='center'>{$row['ava_quantity']}KG</td>

			</tr>";
		}

		$data .= "</table>";
		echo $data;

	}else{
		echo "No result found!";
	}
?>
