<?php
 $select= mysqli_query($con,"select * from tbl_module_$type");
 //changing name
@$temp = explode(".", $_FILES["image"]["name"]);
               
@ $extension = end($temp);
          @ $fileName = $temp[0] . "." . $temp[1];
          @ $temp[0] = rand(0, 3000); //Set to random number
         @  $temp = explode(".", $_FILES["image"]["name"]);
          @ $newfilename = round(microtime(true)) . '.' . $extension;
          @$image=$_FILES['image'];
          @	$imageName=$_POST['oldImage'];
//##############LOG ENGINE############

function log_engine($c){
    global $a,$type,$con,$success,$error,$select;
    $c=$b-1;
    $p="INSERT INTO tbl_module_".$type." (";
    for($i=0;$i<$b;$i++){	
    $p=$p."`".$a[$i][0]."`";
    if($i==$c){}else{$p=$p.",";}
    }
    $p=$p.") VALUES (";
    for($i=0;$i<$b;$i++){	
    $p=$p."'".$a[$i][1]."'";
    if($i==$c){}else{$p=$p.",";}
    }
    $sql= $p.");";
            if ($con->query($sql) === TRUE) {
           
                $success="User created success";
                $qry=$select;
                } else {
                $error="Error: " . $sql . "<br>" . $con->error;
                }$con->close();
        
            return 0;	
    
}
//##############COMPRESS ENGINE########################
function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') {
      $image = imagecreatefromjpeg($source);
  }
  elseif ($info['mime'] == 'image/gif'){ 
      $image = imagecreatefromgif($source);
  }
  elseif ($info['mime'] == 'image/png'){ 
      $image = imagecreatefrompng($source);
  }
  imagejpeg($image, $destination, $quality);

}

 //##############INSERT ENGINE######################## 
@$a;
function insert($b){
global $a,$type,$con,$success,$error,$select;
$c=$b-1;
$p="INSERT INTO tbl_module_".$type." (";
for($i=0;$i<$b;$i++){	
$p=$p."`".$a[$i][0]."`";
if($i==$c){}else{$p=$p.",";}
}
$p=$p.") VALUES (";
for($i=0;$i<$b;$i++){	
$p=$p."'".$a[$i][1]."'";
if($i==$c){}else{$p=$p.",";}
}
$sql= $p.");";
        if ($con->query($sql) === TRUE) {
       
            $success="User created success";
            $qry=$select;
            } else {
            $error="Error: " . $sql . "<br>" . $con->error;
            }$con->close();
    
		return 0;	
}
//####################UPDATE ENGINE#############################

function update($b){
    global $con,$error,$select,$type,$success,$id,$a;
    $c=$b-1;
    $p="UPDATE tbl_module_".$type." SET ";
    for($i=0;$i<$b;$i++){	
    $p=$p."`".$a[$i][0]."`='".$a[$i][1]."'";
    if($i==$c){}else{$p=$p.",";}
    }
    $p=$p." WHERE `tbl_module_".$type."`.`id`='".@$id."' ";
    
    $sql= $p.";";
    $qry=mysqli_query($con,$sql);
    if($qry){
      $success=ucfirst($type). " Details Updated Success";
      
      $sql=$select;
  
   //$p="c_".$type;
    }else{
       $error=ucfirst($type). " Details Not Updated".mysqli_error($con);
       $sql=$select;
    }
        return 0;
    }
  
if(isset($_POST['c_'.$type])){
    @$image=$_FILES['image'];
    
    @$imageName='';
    @$temp = explode(".", $_FILES["image"]["name"]);
               
     @ $extension = end($temp);
               @ $fileName = $temp[0] . "." . $temp[1];
               @ $temp[0] = rand(0, 3000); //Set to random number
              @  $temp = explode(".", $_FILES["image"]["name"]);
               @ $newfilename = round(microtime(true)) . '.' . $extension;
  
   $a=array(
    array('image',$newfilename),   
    array('user_name',$_POST["uname"]),
    array('first_name',$_POST["fname"]),
    array('last_name',$_POST["lname"]),
    array('email',$_POST["email"]),
    array('password',md5($_POST["pwd"])),
    array('ip',$_SERVER['REMOTE_ADDR']),
    array('role',$_POST['role'])); 
    insert(8);

        compressImage($_FILES['image']['tmp_name'],$imgPath.$newfilename,60);
        
     }

    //to editable  record
if(isset($_GET['edit'])){
	$id1=$_GET['edit'];
	$sql="SELECT * FROM tbl_module_$type WHERE id='$id1'";
	$query=mysqli_query($con,$sql);
  $editData=mysqli_fetch_assoc($query);
  
  }

//to change the status of a record
if(isset($_GET['status'])){
	$id1=$_GET['status'];
	$sql="update tbl_module_$type set status=!status WHERE id='$id1'";
	
	if ($con->query($sql) === TRUE) {
       
        $success="User Detail Updated success";
        @$qry=mysqli_query($con,"select * from tbl_module_$type where id between $s and $e order by id desc");

        } else {
        $error="Error: " . $sql . "<br>" . $con->error;
        }$con->close();
    }
if(isset($_POST['u_'.$type])){
    $id=$_POST['id'];
  
    if(isset($image['name'])&&!empty($image['name'])){
		
        compressImage($_FILES['image']['tmp_name'],$imgPath.$newfilename,60);
        
            if($imageName!=""){
                //to remove old image from directory
                @unlink($imgPath.$imageName);
          
        }  
      }$a=array(
      array('image',$newfilename),   
      array('user_name',$_POST["uname"]),
      array('first_name',$_POST["fname"]),
      array('last_name',$_POST["lname"]),
      array('email',$_POST["email"]),
      array('ip',$_SERVER['REMOTE_ADDR']),
      array('role',$_POST['role'])); 
               update(7);
    
}
    $qry=$select;
?>