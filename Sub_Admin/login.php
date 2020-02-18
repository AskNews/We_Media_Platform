<?php
//session starting
session_start();



//check where the key exists or not
if(isset($_SESSION['newNewsSub-AdminLogin'])||isset($_SESSION['newAdSub-AdminLogin'])){
	header("location: index.php");//content type defer function, where we redirect the page to the login page
	}
	include "../Super_Admin/includes/dbconfig.php";
	include "../Super_Admin/common_master.php";

//check for login
if(isset($_POST['login'])){
	

	$email = mysqli_real_escape_string($con,$_POST['email']);
	$ms = mysqli_real_escape_string($con,$_POST['password']);
	
	//login from database
	$a=login("tbl_module_user",$email,$ms,0);
	$b=login("tbl_module_user",$email,$ms,1);
		if($a==1){ 
		//for rember me
		if(isset($_POST['rem'])){
			$time = time()+60*60; // for one hour
			setcookie("Newssub-adminCookie",$email,$time);
			}
		$_SESSION['newNewsSub-AdminLogin']=$email;
		$_SESSION['role']=0;
		echo "<script>alert('Ad operator');</script>";
		header ("location: index.php");
		}else if($b==1)
		{
			//for rember me
		if(isset($_POST['rem'])){
			$time = time()+60*60; // for one hour
			setcookie("Adsub-adminCookie",$email,$time);
			}
		$_SESSION['newAdSub-AdminLogin']=$email;
		$_SESSION['role']=1;
		echo "<script>alert('Ad operator');</script>";
		header ("location: index.php");

			}

		
	}

?>

<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Ask News Operator panel</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../icon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
								<p class="lead">Login to your account</p>
							</div>
							<form class="form-auth-small" action="login.php" method="post">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">User Name</label>
									<input type="text" class="form-control" id="signin-email" name="email" placeholder="User Name">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" name="password" placeholder="Password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox" name="rem">
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block" name="login">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Welcome to Ask News </h1>
							<p>Operator</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
