<?php
include "../../Super_Admin/Includes/dbconfig.php";
$viewstateName=null;
$viewstateEmail=null;
$viewstateMobile=null;
$viewstatePassword=null;
$viewstateConfirm=null;


if(array_key_exists("viewstateName",$_POST))
{	
	$viewstateName=$_POST["username"];	
}
else
{
	$viewstateName=null;
}

if(array_key_exists("viewstateEmail",$_POST))
{	
	$viewstateEmail=$_POST["email"];	
}
else
{
	$viewstateEmail=null;
}
if(array_key_exists("viewstateMobile",$_POST))
{	
	$viewstateMobile=$_POST["mobile"];	
}
else
{
	$viewstateMobile=null;
}
if(array_key_exists("viewstatePassword",$_POST))
{	
	$viewstatePassword=$_POST["password"];	
}
else
{
	$viewstatePassword=null;
}
if(array_key_exists("viewstateConfirm",$_POST))
{	
	$viewstateConfirm=$_POST["confirm"];	
}
else
{
	$viewstateConfirm=null;
}
@$viewstateUserProfile=$_FILES["file"]["name"];
if(isset($_POST['submit']))
{ 
    $ipaddress = $_SERVER['REMOTE_ADDR'];   
    $name=$viewstateUserProfile;
    //echo "name= $name";
    $filename=null;
    if(isset($_FILES))
    {
        if($name==null)
        {
            $filename="default.jpg";
        }
        else
        {
            if(($_FILES["file"]["type"]=="image/png") || ($_FILES["file"]["type"]=="image/jpg") || ($_FILES["file"]["type"]=="image/jpeg"))
            {
                $temp = explode(".", $_FILES["file"]["name"]);
                $extension = end($temp);
                $fileName = $temp[0] . "." . $temp[1];
                $temp[0] = rand(0, 3000); //Set to random number
                if (file_exists("img/" . $_FILES["file"]["name"])) 
                {
                    $errorForFile= $_FILES["file"]["name"] . " already exists. ";
                } 
                else 
                {
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    $filename=$newfilename;
                }
            }
            else
            {
                $errorForFile="only jpg,png,jpeg are allow";
            }
        }
    }
    if(strlen($_POST["username"])>0 && strlen($_POST["email"])>0 && strlen($_POST["mobile"])>0 && strlen($_POST["password"])>0 && strlen($_POST["confirm"])>0)
    {
        /*if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $_POST['password']))
        {
            $error_pass="Password must be 6 character long and have alphanumeric and have one special character";
        }*/
        /*else*/ if($_POST["password"]!=$_POST["confirm"])
        {
            $error="password not confirmed";
        }
        else
        {
            $password=md5($_POST["password"]);
            $joindate=date('m/d/Y ', time());
            $query="insert into tbl_content_creator(username,email,mobile,password,channel_logo,IP,join_date) values('$_POST[username]','$_POST[email]','$_POST[mobile]','$password','$filename','$ipaddress','$joindate')";
            // echo "insert into tbl_content_creator(username,email,mobile,password,channel_logo,IP)
            // values('$_POST[username]','$_POST[email]',$_POST[mobile],'$password','$filename','$ipaddress')";
            if(mysqli_query($con,$query))
            {
                header("location:login.php");
            }
            else{
                echo "<script>alert('enter details again')</script>";
            }
        }
    }
    else
    {
        echo "<script>alert('Please fill all the details')</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<title>Welcome to AskNews</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="icon" href="../../icon.png" type="image/x-icon">
<link rel="stylesheet" href="css/style_color.css">
<head>
<style>
a{
    font-size: 14px;
    text-decoration: none;
    color: #00BCD4;
}
.reg-card{width:50%;margin: 5% auto;}
.error{color:red;}
</style>
</head>
<body class="reg-card">
<div> 
<div class="w3-card-4">
<div class="w3-container w3-green">
  <h2>Sign Up</h2>
</div>
<form id="sign_up" method="POST" class="w3-container" enctype="multipart/form-data" ><br/>

<input type="text" class="w3-input" name="username" value="<?php if(isset($viewstateName)){ echo $viewstateName;}?>" pattern="[a-zA-Z0-9]+" id="username" placeholder="User name">
<input type="hidden"  name="viewstateName" /><br/>

<input type="email" class="w3-input" name="email" id="email" value="<?php if(isset($viewstateEmail)){ echo $viewstateEmail;}?>" placeholder="Email Address" >
<input type="hidden"  name="viewstateEmail" ><br>

<input type="password" class="w3-input" name="password" value="<?php if(isset($viewstatePassword)){ echo $viewstatePassword;}?>" id="password"  placeholder="Password">
<input type="hidden"  name="viewstatePassword" /><br/>

<input type="password" class="w3-input" name="confirm" id="confirm" value="<?php if(isset($viewstateConfirm)){ echo $viewstateConfirm;}?>" placeholder="Confirm Password">
<input type="hidden"  name="viewstateConfirm" />
<span id="confirm-error" class="error" ><?php if(isset($error)){ echo $error;}?></span><br/>

<input type="text" class="w3-input" name="mobile"  value="<?php if(isset($viewstateMobile)){ echo $viewstateMobile;}?>" pattern="[6|7|8|9][0-9]{9}" id="mobile" placeholder="Mobile Number">
<input type="hidden"  name="viewstateMobile" /><br/>

<input type="file" class="w3-input" name="file"  id="file" />
<input type="hidden"  name="viewstateUserProfile" />
<span id="file-error" class="error" ><?php if(isset($errorForFile)){ echo $errorForFile;}?></span>
<br/>
<input type="submit" class="w3-button w3-green" name="submit" value="Sign-Up"><br/><br/><br/>
<a  href="login.php" style="float:left">already have account</a>
<br/><br/>
</form>
</div>
</div>
</body>
</html>