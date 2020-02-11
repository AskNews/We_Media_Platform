<?php
$type="gallery";
include 'includes/header.php';
if(isset($_GET['show'])){
    include "Manager/$type/tbl.php";
}else{
    include "Manager/$type/form.php";
}
?>