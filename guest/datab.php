<?php
		session_start();
		$uname = $_REQUEST['uname'];
		$password = $_REQUEST['pass'];
		$cpassword = $_REQUEST['cpass'];
				
				if (empty(trim($uname)) || empty(trim($password)) || empty(trim($cpassword)) ) {
					echo "field empty";
				}

				elseif ($password !== $cpassword) {
					echo "password not match";
				}

				else{
					$file = fopen('database.txt', 'a');
					$name = "\n";
					$name.=$uname;
					fwrite($file, $name);
					fwrite($file, "|".$password);
					fclose($file);
					header("location: Login.php");
				}
				


?>