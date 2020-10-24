<html>
<head>
<title></title>
</head>
<body>
<form action="index.php" method="post" enctype="multipart/form-data" >

<p>

  Upload a file:

  <input type="file" name="uploadedfile">

  <input type="submit" value="Send data">

</p>

</form>
<?php
if($_POST['submit']){
    echo basename( $_FILES["uploadedfile"]["name"]);
}
?>
    <a href="Content_Creator/index.php">Content Creator</a><br>
    <a href="Ad_Creator/index.php">Ad Creator</a><br>
    <a href="Super_Admin/index.php">Super Admin</a><br>
    <a href="Sub_Admin/index.php">Sub Admin</a><br>
    <a href="Sub_Admin/index.php">Sub Admin</a><br>
</body>
<<<<<<< HEAD
</html> 
=======
>>>>>>> 582a82cee17d2c088be2a73e27dbc096222a18c2