<?php
$con= mysqli_connect("localhost","root","");
mysqli_select_db($con,"dbasknews");

$Email=$_POST["email"];
$Pass=$_POST["password"];

$res=mysqli_query($con,"select email,password from tbl_ad_creator where email='$Email' and password='$Pass'");

     if(mysqli_num_rows($res)>0)
        {      
         
         echo '<script language="javascript">';
            echo 'alert("scc")';
            echo '</script>';
            echo "Success";
         //  $_SESSION['username'] = $email;
           header('location:home.php');
        }              
        else
        {
            echo '<script language="javascript">';
            echo 'alert("err")';
            echo '</script>';
           echo "<span><h3 align='Center'>Your Username and Password is Invalid. Please try again.!</span><br>
		   <cente><a href='admin_login.php'>Go Back</a></center>";
        }
?>
