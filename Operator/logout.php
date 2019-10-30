<?php
session_start();
session_destroy();
setcookie("Sub-adminCookie",NULL, time() -1);
header("location: login.php");
?>