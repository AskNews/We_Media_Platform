<?php


//starting session
session_start();

//update data from cookie to session
if(isset($_COOKIE['adminCookie'])){
	$_SESSION['newAccount-AdminLogin'] = $_COOKIE['Account-adminCookie'];
	}

//check where the key exists or not
if(!isset($_SESSION['newAccount-AdminLogin'])){
	header("location: login.php");//content type defer function, where we redirect the page to the login page
	}
?>