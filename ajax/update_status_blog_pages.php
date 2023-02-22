<?php

require_once('../config.php');

$id=$_REQUEST['id'];
$status=$_REQUEST['status'];
$page = $_REQUEST['page'];

if($page == 'blog' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE image_details SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();

}








