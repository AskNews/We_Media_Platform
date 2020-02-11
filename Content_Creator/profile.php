<?php
$type="profile";
include 'includes/header.php';
?>
 
<?php

if(isset($_GET['update_profile']))
{
include 'manager/profile/form.php';
}
?>
<?php
include 'includes/footer.php';
?>