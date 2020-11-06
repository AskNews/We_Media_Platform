<?php
function createUrlSlug($urlString){
  $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
  return $slug;
}
@session_start();
include "../Super_Admin/includes/dbconfig.php";
$title="Welcome to Ask News";
$desc="The News Sharing Platform";
$user="";
$user_idd="";
include "engine/engine.php";
?>
<!DOCTYPE html>
<html>

<head>
<title><?php echo $title;?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
<meta name="description" content="<?php echo $desc;?>">
  <meta name="keywords" content="<?php echo $keyword;?>">
<link href="css/lightbox.css" rel="stylesheet">
<link rel="icon" type="image/png" sizes="96x96" href="../icon.png">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="layout/scripts/responsiveslides.js-v1.53/responsiveslides.css" rel="stylesheet" type="text/css" media="all">
<style>

div.polaroid {
  width: 80%;
  background-color: white;
  box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 20px;
}

div.container {
  text-align: left;
  padding: 10px 10px;
}

.translated-ltr{
	margin-top:-40px;
}
.translated-ltr{
	margin-top:-40px;
}
.goog-te-banner-frame{display:none; margin-top:-20px;}
.goog-logo-link{display:none !important;}
/*.goog-te-gadget{color:grey !important;}*/

    .error{color:red;}
</style>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f2e54d5c354e70013104c4b&product=inline-share-buttons" async="async"></script>
</head>
<body class="">
<div class="wrapper row1">
  <header id="header" class="full_width clear">
    <div id="hgroup">
      <!-- <img src="../logo.png" style="height:100px;"> -->
      <h1>ASK NEWS</h1>
    </div>
    <div id="header-contact">
      <ul class="list none">
      <li><span class="icon-cogs"></span><div id="google_translate_element"></div></li>
      <?php
      if(isset($_SESSION['newViewerLogin'])){
      ?>
        <li><span class="icon-user"></span> <a href="#">Welcome <?php echo @$_SESSION['newViewerLogin'];?></a></li>
        <?php
      }
        ?>
      </ul>
    </div>
  </header>
</div>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type='text/javascript'>
(function(){var gtConstEvalStartTime = new Date();
function d(b){var a=document.getElementsByTagName("head")[0];a||(a=document.body.parentNode.appendChild(document.createElement("head")));a.appendChild(b)}function _loadJs(b){var a=document.createElement("script");a.type="text/javascript";a.charset="UTF-8";a.src=b;d(a)}function _loadCss(b){var a=document.createElement("link");a.type="text/css";a.rel="stylesheet";a.charset="UTF-8";a.href=b;d(a)}function _isNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)if(!(a=a[b[c]]))return!1;return!0}
function _setupNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)a.hasOwnProperty?a.hasOwnProperty(b[c])?a=a[b[c]]:a=a[b[c]]={}:a=a[b[c]]||(a[b[c]]={});return a}window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='en';c._cuc='googleTranslateElementInit';c._cac='';c._cam='';c._ctkk='443656.3771592044';var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main.js');})();})();
</script>
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <nav id="topnav">
    <ul class="clear">
      <li <?php echo $type == "index"?'class="active"':'';?>><a href="index.php" title="Homepage">Homepage</a></li>
      <?php
     
	 while($row=mysqli_fetch_array($query)){
      $url=createUrlSlug($row['title']);
	 ?>
      <li <?php echo ($type==$url)?'class="active"':'';?>><a href="category.php?cat=<?php echo $url;?>" title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a></li>
      <?php
     }
     
     if(isset($_SESSION['newViewerLogin'])){ ?>
     <li <?php echo $type == "MyAccount"?'class="active"':'';?>><a class="drop" href="#" title="My Account">My Account</a>
        <ul>
          <li><a href="account.php?pass" <?php echo $type == "MyAccount"?'class="active"':'';?> title="Change Password">Change Password</a></li>
          <li><a href="account.php?edit" <?php echo $type == "MyAccount"?'class="active"':'';?> title="Edit Profile">Edit Profile</a></li>
          <li><a href="account.php?follower" <?php echo $type == "follower"?'class="active"':'';?> title="Follower">Following</a></li>
        </ul>
      </li>
     <?php
     } ?>
      <li <?php echo $type == "gallery"?'class="active"':'';?>><a href="gallery.php" title="Gallery">Gallery</a></li>
     <?php
     if(isset($_SESSION['newViewerLogin'])){
     ?>
      <li <?php echo $type == "Logout"?'class="active"':'';?>><a href="logout.php" title="Logout">Logout</a></li>
      
    
       <?php
     }else{
      ?>
       <li <?php echo $type == "Login"?'class="active"':'';?>><a href="login.php" title="Login">Login</a></li>
      <li <?php echo $type == "Register"?'class="active"':'';?>><a href="Register.php" title="Register">Register</a></li>
     <?php
     }
     ?>
     
    </ul>
  </nav>
</div>