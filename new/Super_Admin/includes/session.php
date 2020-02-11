<?php


//starting session
session_start();

//update data from cookie to session
if(isset($_COOKIE['SuperAdminCookie'])){
	$_SESSION['newSuper-AdminLogin'] = $_COOKIE['SuperAdminCookie'];
	}

//check where the key exists or not
if(!isset($_SESSION['newSuper-AdminLogin'])){
	header("location: login.php");//content type defer function, where we redirect the page to the login page
	}
?>