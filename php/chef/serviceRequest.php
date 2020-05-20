<?php

 	session_start();
//if session was destroy in log out page we need to do login again.
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../../index.html");
 	}
    require_once('../../service/functions.php');
    $serviceName = $_GET['serviceName'];
    $reqBy=$_SESSION['user']['user_id'];
    $doneService = service($serviceName,$reqBy);

    if ($doneService) {
      echo "Request Sent";
    }else{
      echo "sent error";
    }
?>
