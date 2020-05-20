<?php
 	session_start();
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../index.html");
 	}
  require_once("../service/functions.php");
  $bid = $_GET['bid'];
  $booking= bookingDlt($bid);

  if ($booking) {
    header("location: ../views/guest/bookedrooms.php");
  }
?>
