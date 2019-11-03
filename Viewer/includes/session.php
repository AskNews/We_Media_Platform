<?php


//starting session
session_start();

//update data from cookie to session
if(isset($_COOKIE['adminCookie'])){
	$_SESSION['newViewerLogin'] = $_COOKIE['ViewerCookie'];
	}

//check where the key exists or not
if(!isset($_SESSION['newViewerLogin'])){
	header("location: login.php");//content type defer function, where we redirect the page to the login page
	}else{
		//header("location: index.php");//content type defer function, where we redirect the page to the login page
		
	}
?>