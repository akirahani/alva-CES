<?php
	session_start();
	unset($_SESSION['id']);
	unset($_SESSION['nhom']);
	unset($_SESSION['fullname']);
	header("location:login.php");
?>