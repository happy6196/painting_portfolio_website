<?php
require_once('../config.php');
//require_once('inc.php');
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];


if($type=="deleteimgdetails")
{

$delete="DELETE FROM blog WHERE id='".$id."'";
//$delete_res=mysql_query($delete);
 $stmt = $conn->prepare($delete); 
     $stmt->execute();
    

if($stmt)
{
echo "deleted";
}


}