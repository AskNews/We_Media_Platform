<?php

if(isset($_POST["btnsmt"])){
    $uname=$_POST["uname"];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    
    $pwd=$_POST["pwd"];
    $role=$_POST["role"];
    $sql="INSERT INTO `tbl_module_user` (
        `user_name`, `first_name`, `last_name`, `email`, `password`,`ip`, `status`, `role`)
         VALUES 
         ('$uname','$fname', '$lname', '$email', MD5('$pwd'),'::1', '1', '$role')";
    
    if ($con->query($sql) === TRUE) {
       
        $success="User created success";
        
        } else {
        $error="Error: " . $sql . "<br>" . $con->error;
        }$con->close();
}

if(isset($_GET['next'])){
$s=$s+10;
$e=$e+10;
@$qry=mysqli_query($con,"select * from $type where id between $s and $e order by id desc");
}
else{
    
    @$qry=mysqli_query($con,"select * from $type where id between $s and $e order by id desc");

}

    

//to change the status of a record
if(isset($_GET['status'])){
	$id1=$_GET['status'];
	$sql="update $type set status=!status WHERE id='$id1'";
	
	if ($con->query($sql) === TRUE) {
       
        $success="User created success";
        @$qry=mysqli_query($con,"select * from $type where id between $s and $e order by id desc");

        } else {
        $error="Error: " . $sql . "<br>" . $con->error;
        }$con->close();
    }
?>