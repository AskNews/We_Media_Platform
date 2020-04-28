<?php
$type="adunit";
include "includes/header.php";
include_once "engine/engine.php";
?>
<div class="main-content">
<div class="page-wrapper">
<?php
if($wal_amt>=100 && $cvv!=0 && $card!=0 && $approve==1 )
{
    if(isset($_GET['form']))
    {
        include "manager/$type/form.php";
    }
    if(isset($_GET['table']))
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
                    <p class="text-light">please modify your bank details or refill your wallet amount to get access your account <br/>
                    click to modify <a href='wallet.php?wallet'>modify details</a><br/>
                    or you are block by admin</p>                                        
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