<?php
$type="adunit";
include "includes/header.php";
include_once "engine/engine.php";
?>
<div class="main-content">
<div class="page-wrapper">
<?php

if($wal_amt>=100 && $approve==1 )
{
    if(isset($_GET['form']) || isset($_GET['adid'])  )
    {
        include "manager/$type/form.php";
    }
    if(isset($_GET['table']) || isset($_GET['page']))
    {
        include "manager/$type/table.php";
    }
    if(isset($_GET['amount']))
    {
        include "manager/$type/ad_amount.php";
    }
}
else
{ ?>
    <div class="col-md-12">
        <div class="card bg-warning">
            <div class="card-body">
                <blockquote class="blockquote mb-0 text-light">
                    <p class="text-light">your WMP wallet amount is less than 100<br/> please refill it <a href='wallet.php'>Re-fill wallet</a></p>                                        
                </blockquote>
            </div>
        </div>
    </div>
    <?php
}
?>
</div>
</div>
<?php
include "includes/footer.php";
?>