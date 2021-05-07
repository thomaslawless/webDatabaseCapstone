<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
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

$resturantSearch = $conn->real_escape_string($_REQUEST['resturant_search']);

$sql = "SELECT * FROM application WHERE resturant_name = $resturant_search";
