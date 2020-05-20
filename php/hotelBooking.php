<?php
 	session_start();
 	if (!isset($_SESSION['uname'])) {
 		header("location: ../index.html");
 	}
require_once("../service/functions.php");
$name=$_POST['hotel_name'];
$price = 1;
$checkIn =$_POST['checkin'];
$checkout =$_POST['checkout'];
$rid=$_GET['rid'];
$hid=$_GET['hid'];
// TODO: guest info need with login;
$guestid= 2;

$book= hotelbooking($hid,$rid,$guestid,$checkIn,$checkout,$price);

if ($book) {
  header("location: ../views/guest/reserve.php");
}else{
  echo "error";
}

?>
