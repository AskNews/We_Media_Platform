<?php
include '../Super_Admin/Includes/dbconfig.php';
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
    $filename=null;
    $newfilename="";
    $f=true;
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
                $extension = strtolower(end($temp));
                $fileName = $temp[0] . "." . $temp[1];
                $temp[0] = rand(0, 3000); //Set to random number
                //if (file_exists("img/" . $_FILES["file"]["name"])) 
               // {
                //    $errorForFile= $_FILES["file"]["name"] . " already exists. ";
                //} 
                //else 
               // {
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    $filename=$newfilename;
                //}
            }
            else
            {
                $errorForFile="only jpg,png,jpeg are allow";
                $f=false;
            }
        }
    }
    if(strlen($_POST["username"])>0 && strlen($_POST["email"])>0 && strlen($_POST["mobile"])>0 && strlen($_POST["password"])>0 && strlen($_POST["confirm"])>0                    )
    {
        if (!preg_match('/^[A-Za-z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,5}$/', $_POST['email']))
        {
            $err_email="Invalid email";
            $f=false;
        }
        if($_POST["password"]!=$_POST["confirm"])
        {
            $err_cpass="password not confirmed";
            $f=false;
        }
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%^&*+=\/*]{8,12}$/', $_POST['password'])) {
            $err_pass="Password must be Contain 1 Char. & 1 number 1 & special char";
            $f=false;
        }
        if (!preg_match('/^[a-zA-Z\s]+[0-9\s]+$/', $_POST['username'])) {
            $err_user="Please insert alpha numeric value";
            $f=false;
        }
        if (!preg_match('/^[0-9]{10}$/', $_POST['mobile'])) {
            $f=false;
            $err_mob="Invaid Mobile number ";
        }
        $data=mysqli_query($con,"select username as uname,email from tbl_content_creator");
        while($r=mysqli_fetch_array($data))
        {
            if($r['uname']==$_POST['username'])
            {
                $f=false;
                $err_user="Username already exists";
            break;
            }
            if($r['email']==$_POST['email'])
            {
                $f=false;
                $err_email="Email already exists";
                break;
            }
        }
        if($f==true)
        {
            $password=md5($_POST["password"]);
            $joindate=date('m/d/Y ', time());
            $query="insert into tbl_content_creator(username,email,mobile,password,channel_logo,c_date) values('$_POST[username]','$_POST[email]','$_POST[mobile]','$password','$filename','$joindate')";
            if(mysqli_query($con,$query))
            {
               move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$newfilename);
               header("location:login.php");
            }
            else{
                echo "<script>try again...:((</script>";
            }
            //echo $query.".......................";
        }
    }
    else
    {
        if(strlen($_POST['username'])==0)
        {
            $err_user="please enter username";
        }
        if(strlen($_POST["email"])==0)
        {
            $err_email="please enter email";
        }
        if(strlen($_POST["mobile"])==0) 
        {
            $err_mob="please enter mobile";
        }
        if(strlen($_POST["password"])==0) 
        {
            $err_pass="please enter password";
        }
        if(strlen($_POST["confirm"])==0)
        {
            $err_cpass="please enter password";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up</title>
    <!-- Favicon-->
    <link rel="icon" href="icon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <style>
    .error{color:red;}
    </style>
    
   <!--<script src="plugins/jquery/jquery.min.js">
        /*$(document).ready(function(){*/
        $("#submit").click(function(){
            var oPassword=$("#passwword").val();
            var oConfirm=$("#confirm").val();
            if(oPassword!=oConfirm)
            {
                $("#confirm-error").html("Password not confirmed");
            }
        });
        /*});*/
   </script> -->
</head>
<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Content<b>Creator</b></a>
            <!--<small>Admin BootStrap Based - Material Design</small>-->
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="msg">Register a new membership</div>
                    
                    <div class="input-group">
                    
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" value="<?php if(isset($viewstateName)){ echo $viewstateName;}?>" pattern="[a-zA-Z0-9]+" id="username" placeholder="User name">
                            <input type="hidden"  name="viewstateName" />
                            
                        </div>
                        <span id="username-error" class="error" ><?php echo @$err_user;?></span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" id="email" value="<?php if(isset($viewstateEmail)){ echo $viewstateEmail;}?>" placeholder="Email Address" >
                            <input type="hidden"  name="viewstateEmail" />
                            
                        </div>
                        <span id="email-error" class="error" ><?php echo @$err_email;?></span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                             <input type="password" class="form-control" name="password" value="<?php if(isset($viewstatePassword)){ echo $viewstatePassword;}?>" id="password"  placeholder="Password">
                            <input type="hidden"  name="viewstatePassword" />
                            
                        </div>
                        <span  class="error"><?php if(isset($err_pass)){ echo @$err_pass;} ?> </span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" id="confirm" value="<?php if(isset($viewstateConfirm)){ echo $viewstateConfirm;}?>" placeholder="Confirm Password">
                            <input type="hidden"  name="viewstateConfirm" />
                            
                        </div>
                        <span id="confirm-error" class="error" ><?php if(isset($err_cpass)){ echo $err_cpass;}?></span>
                    </div>
					 <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">call</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="mobile"  value="<?php if(isset($viewstateMobile)){ echo $viewstateMobile;}?>"  id="mobile" placeholder="Mobile Number">
                            <input type="hidden"  name="viewstateMobile" />
                            
                        </div>
                        <span id="mobile-error" class="error" ><?php echo @$err_mob;?></span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">perm_identity</i>
                        </span>
                        <div class="form-line">
                            <input type="file" class="form-control" name="file"  id="file" />
                            <input type="hidden"  name="viewstateUserProfile" />
                            
                        </div>
                        <span id="file-error" class="error" ><?php if(isset($errorForFile)){ echo $errorForFile;}?></span>
                        
                    </div>
                    
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                    
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" id="submit" name='submit'>SIGN UP</button>
                    

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="login.php">You already have a membership?</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <!--<script src="plugins/jquery-validation/jquery.validate.js"></script>-->

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-up.js"></script>
</body>
</html>