<?php 
$type="ad_unit";
$pag="settings";
include "includes/header.php";
if(@$_GET['setting']=="privacy"){
    include "Manager/".$pag."/form.php";

}else{
    include "Manager/".$pag."/tbl.php";

}
include "includes/footer.php";
?>