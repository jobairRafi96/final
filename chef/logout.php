<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['uname']);
session_destroy();
header("location: ../../index.html");
?>
