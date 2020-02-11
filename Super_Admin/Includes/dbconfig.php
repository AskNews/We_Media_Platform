<?php
//local and remote server connection
<<<<<<< HEAD
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1:3306' || $_SERVER['REMOTE_ADDR'] == '::1'){
=======
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1:3306' && $_SERVER['REMOTE_ADDR'] == '::1'){
>>>>>>> 0862aeb0e4ffab4970a25d74a82146c7a04f35b2
	
	@define("hostname","127.0.0.1:3306");
	@define("username","root");
	@define("password","");
	@define("database","dbasknews");
	
	}else{-
		@define("hostname","127.0.0.1:3307");
	@define("username","root");
	@define("password","");
	@define("database","dbasknews");
	
		}

		// Create connection
$con = new mysqli(hostname,username,password,database);
$db = mysqli_select_db($con,database);

// Check connection
if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}


?>