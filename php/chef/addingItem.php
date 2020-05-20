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
  $itemQuantity = $_POST['quantity'];
  $mid=$_GET['Id'];

  if (empty($itemName)||empty($itemPrice) || empty($itemQuantity)) {
    echo("<h1 class='error'>empty submittion</h1>");
  }else {
    $addDone=itemAdd($itemName,$itemQuantity,$itemPrice,$mid);
      if ($addDone) {
        header("location: ../../views/chef/menudetails.php?Id={$mid}");
      }else{
        echo "error";
      }

  }

?>

</body>
</html>
