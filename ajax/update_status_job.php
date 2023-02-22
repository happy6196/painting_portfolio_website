<?php
require_once('../lib/config.php');
$id=$_REQUEST['id'];
$status=$_REQUEST['status'];
$type=$_REQUEST['type'];
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE career SET status='".$stats."',modified=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
                        $stmt->execute();

