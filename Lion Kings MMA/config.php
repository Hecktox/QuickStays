<?php
$servername = "/cloudsql/lions-king:northamerica-northeast1:lions-king";
$username = "root";
$password = "SuperServer12";
$dbname = "gym_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
