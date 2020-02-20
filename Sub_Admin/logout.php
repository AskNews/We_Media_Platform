<?php
session_start();
session_destroy();
setcookie("Newssub-adminCookie",NULL, time() -1);
setcookie("Adsub-adminCookie",NULL, time() -1);

header("location: login.php");
?>