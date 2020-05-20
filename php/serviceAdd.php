<?php
 	session_start();
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../index.html");
 	}
  require_once("../service/functions.php");
  $serviceName = $_POST['service'];
  $uid = $_SESSION['user']['user_id'];
  $check = 0;
  $service = roomserviceGuest($serviceName,$uid,$check);

  if ($service) {
    header("location: ../views/guest/Reserve.php");
  }
?>
