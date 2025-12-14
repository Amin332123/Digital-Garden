<?php
$host = "localhost";    
$db = "digitalgardenproject";    
$user = "root";           
$pass = "";              

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_errno());
}
?>