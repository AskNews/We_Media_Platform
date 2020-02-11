<?php
session_start();
session_destroy();
setcookie("new-AdCreator-Login",NULL, time() -1);
header("location: login.php");
?>