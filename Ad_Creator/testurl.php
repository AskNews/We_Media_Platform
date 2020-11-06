<?php

$res=isURL("ftp://www.example/");
echo $res;
  function isURL($url = NULL) {
    $explode=explode(":",$url);
    $explode1=explode("//",$url);
    $www=explode(".",$explode1[1]);
    $f=array("http","https","ftp");
    
    if(filter_var($url,FILTER_VALIDATE_URL,FILTER_FLAG_PATH_REQUIRED) && in_array($explode[0],$f) && $www[0]=="www" ){
        return " Correct ,   URL Validation passed ";
        }else{
        return  " Wrong , URL Validation failed ";
        }
        
}
?>