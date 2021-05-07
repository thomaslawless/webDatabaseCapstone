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

$resturant_name = $conn->real_escape_string($_REQUEST['resturant_name']);
$resturant_address = $conn->real_escape_string($_REQUEST['resturant_address']);
$resturant_zipcode = $conn->real_escape_string($_REQUEST['resturant_zipcode']);
$resturant_cuisine = $conn->real_escape_string($_REQUEST['resturant_cuisine']);
$resturant_rating = $conn->real_escape_string($_REQUEST['resturant_rating']);

$sql = "INSERT INTO application (resturant_name, resturant_address, resturant_zipcode, cuisine_type, Rating)
 VALUES ('$resturant_name', '$resturant_address', '$resturant_zipcode', '$resturant_cuisine', '$resturant_rating')";
if($conn->query($sql) === true){
    header('Location: listrecords.php');

} else{
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}
 
// Close connection
$conn->close();
?>



