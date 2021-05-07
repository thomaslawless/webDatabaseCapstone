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

// sql to create table
$users = "CREATE TABLE users (
user_id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50)
)";

$app = "CREATE TABLE application (
resturant_id INT AUTO_INCREMENT PRIMARY KEY,
resturant_name VARCHAR(30) NOT NULL,
resturant_address VARCHAR(50) NOT NULL,
resturant_zipcode VARCHAR(5) NOT NULL,
cuisine_type VARCHAT(30) NOT NULL
)";

if ($conn->query($users) === TRUE) {
  echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($conn->query($app) === TRUE) {
    echo "Table App created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

$conn->close();
?>

