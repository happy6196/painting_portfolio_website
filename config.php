<?php 
error_reporting(0);    
session_start();

$servername = "localhost";
$username = "varsha_taneja";
$password = "qwerty@123";
$dbname = "varsha";

try {  
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>