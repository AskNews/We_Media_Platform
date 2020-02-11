<?php
session_start();
session_destroy();
setcookie("OperatorCookie",NULL, time() -1);
header("location: login.php");
?>