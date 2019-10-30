<?php


//starting session
session_start();

//update data from cookie to session
if(isset($_COOKIE['OperatorCookie'])){
	$_SESSION['new-Operator-Login'] = $_COOKIE['OperatorCookie'];
	}

//check where the key exists or not
if(!isset($_SESSION['newOperatorLogin'])){
	header("location: login.php");//content type defer function, where we redirect the page to the login page
	}
?>