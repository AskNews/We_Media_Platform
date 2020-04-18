<?php
/*$page_content = 'AdUnit/manage_ad_unit.php';
include 'Include/userMaster.php';*/
?>

<?php
//$page_content = 'AdUnit/create_ad.php';
//include 'Include/userMaster.php';
$type="adunit";
include "includes/header.php";
include_once "engine/engine.php";
?>
<div class="main-content">
<div class="page-wrapper">
<?php
include "manager/$type/manage_ad_unit.php";
?>
</div>
</div>
<?php
include "includes/footer.php";
?>