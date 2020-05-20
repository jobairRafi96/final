<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <style media="screen">
    .error{
      color: red;
      position: absolute;
      text-align: center;
      top: 40vh;
      left: 80vh;
      font-size: 50px;
      text-shadow: 4px 4px 10px red;
    }
  </style>
  <body>



<?php
 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
  require_once('../../service/functions.php');
  // session data from database
  $itemName = $_POST['name'];
  $itemPrice = $_POST['price'];
  $mid=$_GET['Id'];
  $iname=$_GET['name'];

  if (empty($itemName)||empty($itemPrice)) {
    echo("<h1 class='error'>Empty Submittion</h1>");
  }else {

    $editDone=itemEdit($itemName,$itemPrice,$iname);
      if ($editDone) {
        header("location: ../../views/chef/menudetails.php?Id={$mid}");
      }else{
        echo "error";
      }

  }

?>


</body>
</html>
