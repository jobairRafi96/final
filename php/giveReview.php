<?php
 	session_start();
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../index.html");
 	}
  require_once("../service/functions.php");
  $review = $_POST['msg'];
  $rate=$_POST['rate'];
  $uid=$_SESSION['user']['user_id'];
  $guest=guestGuest($uid);
  $gid = $guest['guest_id'];
  $result = bookedGuest($gid);
  $bookedh=mysqli_fetch_assoc($result);
  $hid=$bookedh['hotel_id'];
  $giveR= givereviewGuest($gid,$hid,$review,$rate);



  if ($giveR) {
    header("location: ../Views/guest/review.php");
  }
?>
