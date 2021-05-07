<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_NAME', 'capstone');
 
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_NAME);
 

if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
?>