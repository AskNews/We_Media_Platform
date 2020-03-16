<?php
session_start();
session_destroy();
setcookie("viewerCookie",NULL, time() -1);
header("location: login.php");
?>