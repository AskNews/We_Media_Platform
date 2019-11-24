<?php 
$type="qna";
include "includes/header.php";
if(isset($_POST['smt'])){
    include "Manager/".$type."/tbl.php";

}else{
include "Manager/".$type."/form.php";
}
include "includes/footer.php";
?>