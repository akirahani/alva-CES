<?php
	session_start();
	unset($_SESSION['spaid']);
	unset($_SESSION['spanhom']);
	unset($_SESSION['spafullname']);
	header("location:login.php");
?>