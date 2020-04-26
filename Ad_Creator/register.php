<?php
/*if(isset($_POST['reg'])){
   echo "<script>alert('Hi')</script>";*/

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
   if(isset($_POST['reg']))
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
            if(($_FILES["file"]["type"]=="img/png") || ($_FILES["file"]["type"]=="img/jpg") || ($_FILES["file"]["type"]=="img/jpeg"))
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
           $data=mysqli_query($con,"select username as uname,email from tbl_ad_creator");
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
               $query="insert into tbl_ad_creator(username,email,phone,password,profile_image,c_date) values('$_POST[username]','$_POST[email]','$_POST[mobile]','$password','$filename','$joindate')";
               if(mysqli_query($con,$query))
               {
                  move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$newfilename);
                 echo "<sript>alert('Insert Success')</sript>";
                  header("location:login.php");
               }
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
                            <form id="register" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" >
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" value="<?php if(isset($viewstateName)){ echo $viewstateName;}?>" pattern="[a-zA-Z0-9]+" id="username" placeholder="Username">
                                    <input type="hidden"  name="viewstateName" />
                                </div>
                                <span style="color:red" id="username-error" class="error" ><?php echo @$err_user;?></span>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" id="email" value="<?php if(isset($viewstateEmail)){ echo $viewstateEmail;}?>" placeholder="Email">
                                    <input type="hidden"  name="viewstateEmail" />
                                </div>
                                <span style="color:red" id="email-error" class="error" ><?php echo @$err_email;?></span>
                                <div class="form-group">
                                    <label>Phone No</label>
                                    <input class="au-input au-input--full" type="number" name="mobile" id="phone" value="<?php if(isset($viewstateMobile)){ echo $viewstateMobile;}?>" placeholder="Phone No">
                                    <input type="hidden"  name="viewstateMobile" />
                                </div>
                                <span style="color:red" id="mobile-error" class="error" ><?php echo @$err_mob;?></span>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" value="<?php if(isset($viewstatePassword)){ echo $viewstatePassword;}?>" id="password" placeholder="Password">
                                    <input type="hidden"  name="viewstatePassword" />
                                </div>
                                <span style="color:red" class="error"><?php if(isset($err_pass)){ echo @$err_pass;} ?> </span>
                                <div class="form-group">
                                    <label>Confirm-Password</label>
                                    <input class="au-input au-input--full" type="password" name="confirm" value="<?php if(isset($viewstatePassword)){ echo $viewstatePassword;}?>" id="password" placeholder="Confirm-Password">
                                    <input type="hidden"  name="viewstateConfirm" />
                                </div>
                                <span style="color:red" id="confirm-error" class="error" ><?php if(isset($err_cpass)){ echo $err_cpass;}?></span>
                                <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">File input</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file" name="file" class="form-control-file">
                                                    <input type="hidden"  name="viewstateUserProfile" />
                                                </div>
                                            </div>
                                            <span style="color:red" id="file-error" class="error" ><?php if(isset($errorForFile)){ echo $errorForFile;}?></span>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" id="reg" name="reg">Register</button>
                               
                            
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="login.php">Login</a>
                                </p>
                            </div>
                            </form>
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