<?php
require_once('../lib/configin.php');
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];


if($type=="deleteimgdetails")
{

$delete="DELETE FROM ti_servicegal WHERE id='".$id."'";
$delete_res=mysql_query($delete);	

if($delete_res)
{
echo "deleted";
}


}