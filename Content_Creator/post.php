
<?php
$type="post";
include 'includes/header.php';
?>

<?php 
if(isset($_GET['all_post']))
{
include 'manager/post/table.php'; 
}
?>
<?php
include 'includes/footer.php'
?>