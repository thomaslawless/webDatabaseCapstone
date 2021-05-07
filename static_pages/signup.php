<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "capstone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$user_name = $conn->real_escape_string($_REQUEST['user_name']);
$email = $conn->real_escape_string($_REQUEST['email']);
$_password = $conn->real_escape_string($_REQUEST['password']);
$confirmpassword = $conn->real_escape_string($_REQUEST['confirmpassword']);

$sql = "INSERT INTO users (username, password, email) 
VALUES ('$user_name', '$email', '$_password')";
if($conn->query($sql) === true){
  header('Location: mainmenu.php'); }
else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}
 
// Close connection
$conn->close();

?>