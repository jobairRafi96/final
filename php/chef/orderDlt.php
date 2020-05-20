<?php

 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
  require_once('../../service/functions.php');
  $sid=$_GET['Id'];


  $doneResult = orderDlt($sid);


  if($doneResult){
      header("location: ../../views/chef/order.php");
  }
  else{
    echo "error";
  }
 ?>
