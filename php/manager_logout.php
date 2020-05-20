<?php

	// Initialize the session.
	session_start();
	//setcookie('usernameMan', '', time()-10, '/');


	// Unset all of the session variables.
	unset($_SESSION['user']);
	unset($_SESSION['manager']);
	unset($_SESSION['hotel']);

	// Finally, destroy the session.    
	session_destroy();



	header("location: ../index.html");

?>