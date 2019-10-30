<?php
//local and remote server connection
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1'){
	
	@define("hostname","127.0.0.1:3307");
	@define("username","root");
	@define("password","");
	@define("database","dbasknews");
	
	}else{-
		define("hostname","localhost");
	define("username","unknown");
	define("password","unknown");
	define("database","unknown");
		}

		// Create connection
$con = new mysqli(hostname,username,password,database);
$db = mysqli_select_db($con,database);

// Check connection
if ($con->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


?>