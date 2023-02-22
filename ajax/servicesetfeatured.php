<?php
require_once('../lib/config.php');
$galid=$_REQUEST['galid'];
$type=$_REQUEST['type'];
$id=$_REQUEST['id'];


if($type=="set_featured")
{

$update="UPDATE services_images SET feature='no' WHERE galid='".$galid."'";
//$update_res=mysql_query($update);
  $stmt = $conn->prepare($update); 
     $stmt->execute();
    


$update2="UPDATE services_images SET feature='yes' WHERE id='".$id."'";
//$update_res2=mysql_query($update2);
  $stmt = $conn->prepare($update2); 
     $stmt->execute();
    

if($stmt)
{
echo "<font color='red'><b>Image Sucessfully Featured Now !!<b/></font>";
}


}