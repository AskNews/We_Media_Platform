<?php
$type="qna";
include "includes/header.php";
include_once "engine/engine.php";
?>
<div class="main-content">
<div class="page-wrapper">
<?php
include "manager/$type/table.php";
?>
</div>
</div>
<?php
include "includes/footer.php";
?>