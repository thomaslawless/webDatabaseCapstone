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
$id =  $conn->real_escape_string($_REQUEST['recordID']);
//$id = (is_numeric($_POST['a']) ? (int)$_POST['a'] : 0);

// sql to delete a record

$sql = "DELETE FROM application WHERE resturant_id= $id";

if ($conn->query($sql) === TRUE) {
    header('Location: remove_records.php');
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?> 