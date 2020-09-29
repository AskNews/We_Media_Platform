<?php

	session_start();
	if(isset($_SESSION['content_creator_uname']))
	{
		header("location: index.php");
	}
	include "../Super_Admin/Includes/dbconfig.php";
	if(isset($_POST['login']))
	{
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$sql="select * from tbl_content_creator where (username='".$username."' or email='".$username."') and password='".md5($password)."'";
        $query=mysqli_query($con,$sql);
        $data=mysqli_fetch_array($query);
        if(!empty($_POST['rememberme']))
        {
            $time = time()+60*60; // for one hour
            setcookie("c_cookie",$username,$time);
        }
        if($data)
        {
            $_SESSION['content_creator_uname']=$username;
            $_SESSION['content_creator_profile']=$data["channel_logo"];
            header ("location: index.php");
        }
        else
        {
            echo '<script>alert("error'.mysqli_error($con).'")</script>';
        }
        
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, in itial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In</title>
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
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Content Creator<b>AskNew</b></a>
            <!--<small>Admin BootStrap Based - Material Design</small>-->
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                        
                            <input type="text" class="form-control" name="username"  value="<?php if(@$_COOKIE['c_cookie']!=null){ echo $_COOKIE['c_cookie'];}?>" placeholder="Username or email" required autofocus>
                         
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="login" >SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.php">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                           <!-- <a href="forgot-password.html">Forgot Password?</a>-->
                        </div>
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
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>
</html>

