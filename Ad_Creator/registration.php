<?php
include '../Super_Admin/Includes/dbconfig.php';
$viewstateName = null;
$viewstateEmail = null;
$viewstateMobile = null;
$viewstatePassword = null;
$viewstateConfirm = null;

if (array_key_exists("viewstateName", $_POST)) {
    $viewstateName = $_POST["username"];
} else {
    $viewstateName = null;
}

if (array_key_exists("viewstateEmail", $_POST)) {
    $viewstateEmail = $_POST["email"];
} else {
    $viewstateEmail = null;
}
if (array_key_exists("viewstateMobile", $_POST)) {
    $viewstateMobile = $_POST["password"];
} else {
    $viewstateMobile = null;
}
if (array_key_exists("viewstatePassword", $_POST)) {
    $viewstatePassword = $_POST["confirm"];
} else {
    $viewstatePassword = null;
}
if (array_key_exists("viewstateConfirm", $_POST)) {
    $viewstateConfirm = $_POST["mobile"];
} else {
    $viewstateConfirm = null;
}

@$viewstateUserProfile = $_FILES["file"]["name"];
if (isset($_POST['submit'])) {
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $name = $viewstateUserProfile;
    echo "name= $name";
    $filename = null;
    if (isset($_FILES)) {
        if ($name == null) {
            $filename = "default.jpg";
        } else {
            if (($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) {
                $temp = explode(".", $_FILES["file"]["name"]);//break arrays
                $extension = end($temp);//last array
                $fileName = $temp[0] . "." . $temp[1];
                $temp[0] = rand(0, 3000); //Set to random number
                if (file_exists("img/" . $_FILES["file"]["name"])) {
                    $errorForFile = $_FILES["file"]["name"] . " already exists. ";
                } else {
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $newfilename);
                    $filename = $newfilename;
                }
            } else {
                $errorForFile = "only jpg,png,jpeg are allow";
            }
        }
    }
    if (strlen($_POST["username"]) > 0 && strlen($_POST["email"]) > 0 && strlen($_POST["password"]) > 0 && strlen($_POST["confirm"]) > 0 && strlen($_POST["Mobile"]) > 0) {
        if ($_POST["password"] != $_POST["confirm"]) {
            $error = "password not confirmed";
        } else {
            $password = md5($_POST["password"]);//Calculate the MD5 hash of the password(decrypter)
            $query = "insert into tbl_ad_creator(user_name,email,password,phone,Image,iP)
            values('$_POST[username]','$_POST[email]','$_POST[mobile]','$password','$filename','$ipaddress')";
            //echo "insert into tbl_content_creator(username,email,mobile,password,channel_logo,IP)
            //values('$_POST[username]','$_POST[email]',$_POST[mobile],'$password','$filename','$ipaddress')";
            if (mysqli_query($con, $query)) {
                header("location:AdLogin.php");
            }
        }
    } else {
        echo "<script>alert('Please fill all the details')</script>";
    }
}
?>
<!DOCTYPE html>


    
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">

        <!-- Title Page-->
        <title>Welcome To AskNews</title>

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

    <body class="animsition">

        <!-- Registration form-->
        <div class="page-wrapper">
            <div>
                <div class="container">
                    <div class="login-wrap">
                        <div class="login-content">
                            <div class="login-logo">
                                <a href="#">
                                    <h3 style='color:blue'>Advertisement Creator</h3>
                                </a>
                            </div>

                            <div class="login-form">
                                <form  id="sign_up" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input class="au-input au-input--full" type="text" name="username" placeholder="username" value="<?php if(isset($viewstateName)){ echo $viewstateName;}?>" pattern="[a-zA-Z0-9]+" id="username">
                                        <input type="hidden"  name="viewstateName" />
                                        <span id="username-error" class="error" ></span>
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input class="au-input au-input--full" type="email" name="email"  id="email" value="<?php if(isset($viewstateEmail)){ echo $viewstateEmail;}?>" placeholder="Email">
                                        <input type="hidden"  name="viewstateEmail" />
                                        <span id="email-error" class="error" ></span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="au-input au-input--full" type="password" name="password" value="<?php if(isset($viewstatePassword)){ echo $viewstatePassword;}?>" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="password"  placeholder="Password">
                                        <input type="hidden"  name="viewstatePassword" />
                                        <span  class="error">Password must be 6 character long and have alphanumeric and have one special character  </span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Confirm-Password</label>
                                        <input class="au-input au-input--full" type="password" name="confirm" id="confirm" value="<?php if(isset($viewstateConfirm)){ echo $viewstateConfirm;}?>" placeholder="Confirm-Password">
                                         <input type="hidden"  name="viewstateConfirm" />
                                         <span id="confirm-error" class="error" ><?php if(isset($error)){ echo $error;}?></span>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input class="au-input au-input--full" type="text" name="mobile"  value="<?php if(isset($viewstateMobile)){ echo $viewstateMobile;}?>" pattern="[6|7|8|9][0-9]{9}" id="mobile" placeholder="Mobile">
                                        <input type="hidden"  name="viewstateMobile" />
                                        <span id="mobile-error" class="error" ></span>
                                    </div>
                                    
                                     <div class="form-group">
                                        <input class="au-input au-input--full" type="file" id="file-input" name="file-input" class="form-control-file"  id="file">
                                        <input type="hidden"  name="viewstateUserProfile" />
                                         <span id="file-error" class="error" ><?php if(isset($errorForFile)){ echo $errorForFile;}?></span>
                                    </div>

                            </div>

                            <!-- <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div> -->
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>

                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="login.php">Sign In</a>
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


<!-- end document-->