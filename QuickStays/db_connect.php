<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<?php
$host = 'localhost';
$dbname = 'quickstays_db';
$username = 'root';
$password = '';

try {
    // Create a new PDO database connection
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set PDO to throw exceptions on errors for better error handling
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle database connection failure gracefully
    die("Database connection failed: " . $e->getMessage());
}
?>