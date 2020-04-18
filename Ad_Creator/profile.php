<?php
$type="profile";
include 'includes/header.php';
include_once "engine/engine.php";
if(isset($_GET['update_profile']))
{

    include 'manager/profile/form.php';
}
include 'includes/footer.php';
?>                           