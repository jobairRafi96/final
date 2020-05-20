<?php

	session_start();

	include('../service/functions.php');
	//include_once('db.php');
	//require('db.php');
	//require_once('db.php');

	if(isset($_POST['login'])){

		$email = $_POST['email'];
		$password = $_POST['password'];
		$user = validateLogin($email, $password);                                      //associatarray



		if(is_null($user)){
			echo "invalid username/password";
		}else{

			if(count($user) > 0 ){
				$_SESSION['user'] = $user;                                                 //user SESSION created
				//$type = getUserType($_SESSION['user']['user_id']);

				if($_SESSION['user']['type'] == "guest"){
					$_SESSION['uname']=$email;
					header("location: ../views/guest/reserve.php");
				}else if($_SESSION['user']['type'] == "manager"){
					header("location: ../views/manager/manager_home.php");
				}elseif ($_SESSION['user']['type'] == "chef") {
					$_SESSION['uname']=$email;
					header("location: ../views/chef/chef.php");

				}

			}else{
				echo "Invalid Email/Password!";

			}
		}
	}

?>
