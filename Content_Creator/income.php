<?php
$type="income";
include "includes/header.php"
?>
<?php
               if(isset($_GET['earnNtransaction'])){
include "manager/income/form.php";
               }elseif(isset($_GET['history'])){
                include "manager/income/table.php";
               }
?>

<?php 
include "includes/footer.php";
?>