<?php
//$page_content = 'AdUnit/create_ad.php';
//include 'Include/userMaster.php';
$imgPath = "image/";
$type="adunit";
include "includes/header.php";
include_once "engine/engine.php";
?>
<div class="main-content">
<div class="page-wrapper">
<?php
include "manager/$type/form.php";
?>
</div>
</div>
<?php
include "includes/footer.php";
?>