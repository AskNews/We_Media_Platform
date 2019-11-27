<?php
session_start();
session_destroy();
$_SESSION['new-viewer-Login']=NULL;
setcookie("new-viewer-Login",NULL, time() -1);
header("location: index.php");
?>