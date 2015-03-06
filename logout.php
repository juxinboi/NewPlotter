<?php
	session_start();
	unset($_SESSION['islogin']);
	
	session_destroy();
	session_regenerate_id();
	
	
	//clear all session data
	unset($_SESSION);
	$_SESSION = array();
	
	header('location: index.php');
?>