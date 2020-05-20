<?php

	session_start();
	include('../service/functions.php');


		if(isset($_POST['login'])){

		$email = $_POST['email'];
		$password = $_POST['password'];
			
		$user = validateAdminLogin($email, $password);                                 //associative array 

		if(is_null($user)){
			echo "invalid username/password";
		}else{

			if(count($user) > 0 ){

				$_SESSION['uname'] = $user;   
				$_SESSION['admin'] = $user;                                              //admin SESSION created
				header("location: ../views/admin/home.php");
				

			}else{
				echo "Invalid Email/Password!";

			}
		}
	}
?>