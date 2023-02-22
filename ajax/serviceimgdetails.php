<?php
//require_once('../lib/configin.php');
require_once('inc.php');
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
$title=$_REQUEST['title'];
$alttext=$_REQUEST['alttext'];
$imgweight=$_REQUEST['imgserialz'];

if($type=="savedimgdetails")
{

$update="UPDATE ti_servicegal SET title='".$title."', alttext='".$alttext."', serial='".$imgweight."' WHERE id='".$id."'";
$update_res=mysql_query($update);	

if($update_res)
{
echo "<font color='red'><b>Saved<b/></font>";
}


}