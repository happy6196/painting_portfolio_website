<?php
require_once('../lib/config.php');
if($_REQUEST['status']){
$id=$_REQUEST['id'];

$status=$_REQUEST['status'];
$type=$_REQUEST['type'];
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE services SET status='".$stats."',modified=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
                        $stmt->execute();

if($stmt)
{
echo "Item Status Changes Sucessfully !!";  
}

}


if($_REQUEST['feature']){
$id=$_REQUEST['id'];
$feature=$_REQUEST['feature'];

if($feature=='u')
{ $feature1='p'; }
if($feature=='p')
{ $feature1='u'; }

$update_status="UPDATE services SET feature='".$feature1."',modified=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
                        $stmt->execute();

if($stmt)
{
echo "Item Status Changes Sucessfully !!";  
}
}