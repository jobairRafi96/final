<?php
 	session_start();
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../index.html");
 	}
  require_once("../service/functions.php");
  $complain = $_POST['msg'];
  $uid=$_SESSION['user']['user_id'];
  $guest=guestGuest($uid);
  $gid = $guest['guest_id'];
  $check= 0;

  $cmp = complainGuest($complain,$check,$gid);



  if ($cmp) {
    header("location: ../views/guest/Reserve.php");
  }
?>
