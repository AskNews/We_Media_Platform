<?php
$type ="MyAccount";
include "../Super_Admin/includes/dbconfig.php";
include "includes/header.php";
if(isset($_GET['pass']))
{
    include "manager/$type/pass.php";
}
if(isset($_GET['edit']))
{
    include "manager/$type/edit.php";
}
if(isset($_GET['follower']))
{
    include "manager/$type/follower.php";
}
?>
<?php 
include "includes/footer.php";
?>