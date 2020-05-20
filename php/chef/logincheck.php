<?php

	session_start();

	include('../../service/functions.php');
	

	if(isset($_POST['login'])){

		$email = $_POST['email'];
		$password = $_POST['password'];



		if ( empty(trim($email)) || empty(trim($password)) ) {
			echo "Null submission";
		}else{
						$user = validate($email, $password);
						if(is_null($user)){
							echo "invalid username/password";
						}else{

									if(count($user) > 0 ){
										$_SESSION['user'] = $user;                                                 //user SESSION created
										if($_SESSION['user']['type'] == "guest"){
											header("location: ../views/guest_home.php");
										}else if($_SESSION['user']['type'] == "manager"){
											header("location: ../views/manager/manager_home.php");
										}elseif ($_SESSION['user']['type'] == "chef") {
											// TODO: need cookie
											$_SESSION['uname']=$email;
											header("location: ../../views/chef/chef.php");
										}else{
											echo "Invalid Email/Password!";
										}

									}else{
											echo "Invalid Email/Password!";
										}
								}
				}
	}

?>
