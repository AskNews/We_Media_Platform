<?php


function login($tbl,$id,$pwd,$role){
	global $con;
	$enc=md5($pwd);
	try{
$sql="select count(*) from $tbl where user_name='$id' and password='$enc' and role=$role and status=1 and deletion=1";

}catch (Exception $e) {
echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
$qry=mysqli_query($con,$sql);
$result=mysqli_fetch_array($qry);
return $result[0];

}
?>