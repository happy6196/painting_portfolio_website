<?php
require_once('../lib/config.php');
//require_once('inc.php');
$galid=$_REQUEST['galid'];
$type=$_REQUEST['type'];
$id=$_REQUEST['id'];


if($type=="set_featured")
{

$update="UPDATE page_images SET feature='no' WHERE galid='".$galid."'";
  $stmt = $conn->prepare($update); 
     $stmt->execute();
   


$update2="UPDATE page_images SET feature='yes' WHERE id='".$id."'";
  $stmt = $conn->prepare($update2); 
     $stmt->execute();
     

if($stmt)
{
echo "<font color='red'><b>Image Sucessfully Featured Now !!<b/></font>";
}


}