<?php
session_start();
session_destroy();
setcookie("new-viewer-Login",NULL, time() -1);
header("location: login.php");
?>