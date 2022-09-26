<?php
$servername = "localhost";
$username = "memory1678";
$password = "memory1678!@#";
$dbname = "memory1678";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>