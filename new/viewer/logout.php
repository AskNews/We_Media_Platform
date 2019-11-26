<?php
session_start();
sesion_destroy();
$_SESSION['new-viewer-Login']=NULL;
setcookie("new-viewer-Login",NULL, time() -1);
header("location: index.php");
?>