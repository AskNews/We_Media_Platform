<?php
session_start();
session_destroy();
setcookie("adminCookie",NULL, time() -1);
header("location: login.php");
?>