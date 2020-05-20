<?php
 	session_start();
 	// if (!isset($_POST['register'])) {
 	// 	header("location: login.php");
 	// }

require_once("service/functions.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password1 = $_POST['pass1'];
$password2 = $_POST['pass2'];
$address = $_POST['address'];
$date = $_POST['dob'];
$type="guest";
$phoneNo = $_POST['phn'];

if ($username=="" || $email=="" || $password1=="" || $password2=="" || $address=="" || $date=="" || $phoneNo==""   ) {
  echo "Null submission";
}elseif ($password1 != $password2) {
    echo "password didn't match";
}else{
  $ruser=userregi($email,$password1,$type);

  $user = userAll($email);
  $uid = $user['user_id'];
  //echo $uid;

  $guestreg= guestregi($uid,$username,$email,$address,$date,$phoneNo);
  if ($guestreg) {
    echo "done";
  }

}


?>
