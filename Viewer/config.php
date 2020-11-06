<?php
session_start();

require_once 'vendor/autoload.php';
$google_client=new Google_Client();
$google_client->setClientId("517480612170-k5n0gq0hlgvcnvk8tdrp9i4m6m082d3f.apps.googleusercontent.com");
$google_client->setClientSecret("D_FpYBGInGncCrPO4vOoBLpD");
$google_client->setRedirectUri("http://localhost/We_Media_Platform/Viewer/login.php");
$google_client->addScope('email');
$google_client->addScope('profile');
?>