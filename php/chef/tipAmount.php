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
      font-size: 60px;
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
  $userId=$_SESSION['user']['user_id'];
  $reqAmount = $_POST['requestAmount'];

   $result = chefpi($userId);
   $chefid=$result['chef_id'];


  $tip['tip'] = (int)$result['tip_amount'];
  $reqAmount = (int)$reqAmount;
  $newBalance=$tip['tip']-$reqAmount;
if (empty($reqAmount)) {
  echo("<h1 class='error'>Empty Field</h1>");
}else {
  if ($newBalance>=0) {
    $balanceUpDone=updateBalanceT($newBalance,$chefid);
    if ($balanceUpDone) {
      header("location: ../../views/chef/chef.php");
    }else {
      echo"error";
    }
  }else{
      echo("<h1 class='error'>NOT ENOUGH <br /> BALANCE</h1>");
  }
}

?>

</body>
</html>
