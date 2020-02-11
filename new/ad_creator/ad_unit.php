<?php 
$type="ads";
$imgPath="image/ads/";
include "includes/header.php";
if(@$_GET['men']=="ad_unit"){
    include "Manager/".$type."/tbl.php";

}else{
    include "Manager/".$type."/form.php";

}
include "includes/footer.php";
?>