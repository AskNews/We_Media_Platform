<?php

$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "dbasknews");

$AdUnitName = $_POST["unit_name"];
$AdTitle = $_POST["title"];
$Amount = $_POST["amount"];
$AdImage = $_POST["imagefile"];
$Catagory = $_POST["catagory"];
$CPC = $_POST["cpc"];
$URL = $_POST["url"];
$Status = $_POST["status"];

mysqli_query($con, "INSERT INTO tbl_create_ad(ad_name,ad_title,ad_amount,ad_image,ad_catagory,ad_cpc,ad_url,status) VALUES 
('unit_name','title','amount','imagefile','catagory','cpc','url','status')");

if (mysqli_error($con)) {
    echo("Error description: " . mysqli_error($con));
} else {
    echo "successful!";
}
