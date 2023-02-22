<?php
require_once('../config.php');
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
$title=$_REQUEST['title'];
$alttext=$_REQUEST['alttext'];
$imgweight=$_REQUEST['imgserialz'];

if($type=="savedimgdetails")
{

$update="UPDATE ti_gallery SET title='".$title."', alttext='".$alttext."', serial='".$imgweight."' WHERE id='".$id."'";
//$update_res=mysql_query($update);	
  $stmt = $conn->prepare($update); 
     $stmt->execute();
   

if($stmt)
{
echo "<font color='red'><b>Saved<b/></font>";
}


}