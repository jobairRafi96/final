<?php
 	session_start();
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../index.html");
 	}
  require_once("../service/functions.php");
  $req = $_POST['req'];
  $uid=$_SESSION['user']['user_id'];
  $guest=guestGuest($uid);
  $gid = $guest['guest_id'];
  $reqg= requestGuest($req,$gid);

  if ($reqg) {
    header("location: ../views/guest/Reserve.php");
  }
?>
