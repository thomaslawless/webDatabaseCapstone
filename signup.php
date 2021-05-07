<?php
$servername = "localhost";
$username = "root";
//$password = "12345678";
$dbname = "capstone";

// Create connection
$conn = new mysqli($servername, $username, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$user_name = $conn->real_escape_string($_REQUEST['user_name']);
$email = $conn->real_escape_string($_REQUEST['email']);
$password = $conn($_REQUEST['password']);

$sql = "INSERT INTO users (username, password, email) VALUES ('$user_name', '$email', '$password')";
if($conn->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}
 
// Close connection
$conn->close();

?>