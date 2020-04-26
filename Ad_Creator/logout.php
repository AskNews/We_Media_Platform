<?php
session_start();
session_destroy();
setcookie("ad_creator_Cookie",NULL, time() -1);
header("location: login.php");
?>