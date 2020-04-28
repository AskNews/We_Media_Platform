<?php
$type="wallet";
include "includes/header.php";
include_once "engine/engine.php";
?>
<div class="main-content">
 <div class="container">
<?php

    if(isset($_GET['wallet']))
    {
        include "manager/$type/form.php";
    }
    
?>
</div>
</div>
<?php
include "includes/footer.php";
?>