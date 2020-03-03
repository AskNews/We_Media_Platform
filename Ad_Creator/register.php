<?php
if(isset($_POST['reg'])){
   echo "<script>alert('Hi')</script>";

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
                $extension = strtolower(end($temp));
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
                    //move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename);
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
        }
        else*/ if($_POST["password"]!=$_POST["confirm"])
        {
            $error="password not confirmed";
        }
        else
        {
            $password=md5($_POST["password"]);
            $joindate=date('m/d/Y ', time());
            $query="insert into tbl_content_creator(username,email,mobile,password,channel_logo,IP,join_date) values('$_POST[username]','$_POST[email]','$_POST[mobile]','$password','$filename','$ipaddress','$joindate')";
            //echo "insert into tbl_content_creator(username,email,mobile,password,channel_logo,IP)
            //values('$_POST[username]','$_POST[email]','$_POST[mobile]','$password','$filename','$ipaddress')";
            if(mysqli_query($con,$query))
            {

                header("location:login.php");
            } 
        }
    }
    else
    {
        echo "<script>alert('Please fill all the details')</script>";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                            <img src="../logo.png" alt="AskNews" style="height:80px;width:160px;">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" >
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Phone No</label>
                                    <input class="au-input au-input--full" type="number" name="mobile" placeholder="Phone No">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm-Password</label>
                                    <input class="au-input au-input--full" type="password" name="confirm" placeholder="Confirm-Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="reg">Register</button>
                               
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="login.php">Login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->