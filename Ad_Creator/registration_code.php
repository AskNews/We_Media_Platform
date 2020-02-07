<?php

$con= mysqli_connect("localhost","root","");
mysqli_select_db($con,"dbasknews");

$FirstName=$_POST["firstname"];
$LastName=$_POST["lastname"];
$Email=$_POST["email"];
$Pass=$_POST["password"];
$Phone=$_POST["phone"];
$State=$_POST["state"];
$City=$_POST["city"];
$Address1=$_POST["address"];

mysqli_query($con,"INSERT INTO tbl_ad_creator(first_name,last_name,dob,gender,email,phone,password,city,state,address,join_date,ip) VALUES 
('$FirstName','$LastName','1-1-200','M','$Email','$Email','$Phone','$Pass','$City','$State','$Address1','1-1-2000','192.168.1.1')");
                                
         echo "Success $City $FirstName - $LastName - $Email - $Pass - $Phone- $State - $City - $Address1";
         $_SESSION['username'] = $Email;
         header('location:login.php');

?>