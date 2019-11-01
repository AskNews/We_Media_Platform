<?php
$type="comment";
include 'includes/header.php';
?>
<?php
if(isset($_GET['comment']))
{
include 'manager/comment/table.php';
}
?>
<?php
include 'includes/footer.php';
?>