<?php
require_once('../lib/config.php');
$id=$_REQUEST['id'];
$status=$_REQUEST['status'];
$type=$_REQUEST['type'];
if($status=='Close')
{ $stats='Open'; }
if($status=='Close')
{ $stats='Open'; }

$update_status="UPDATE career SET openclose='".$stats."',modified=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
                        $stmt->execute();

