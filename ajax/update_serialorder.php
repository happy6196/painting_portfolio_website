<?php

require_once('../config.php');
$id=$_REQUEST['id'];
$serial_order =$_REQUEST['serial'];
$page=$_REQUEST['page'];


if($page=='blog')
{ 

$update_status="UPDATE blog SET serial='".$serial_order."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
}



