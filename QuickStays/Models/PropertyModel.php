<!-- 
    All I did here was change the file name and path 
    strings within the file to work with my stucture,
    and modified the updateProperty() function to 
    adapt to the new database and used $db instead of $pdo 
    to adapt to 'db_connect.php'. - Maximus
-->

<?php
require_once 'db_connect.php';

function getProperties()
{
    global $db;
    $stmt = $db->query('SELECT * FROM Properties');
    return $stmt->fetchAll();
}

function getPropertyById($id)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM Properties WHERE PropertyID = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function updateProperty($id, $name, $country, $city, $province, $address, $description, $type, $rooms, $bathrooms, $availabilityDate)
{
    global $db;
    $stmt = $db->prepare('UPDATE Properties SET PropertyName=?, Country=?, City=?, Province=?, StreetAddress=?, Description=?, PropertyType=?, NumRooms=?, NumBathrooms=?, AvailabilityDate=? WHERE PropertyID=?');
    $stmt->execute([$name, $country, $city, $province, $address, $description, $type, $rooms, $bathrooms, $availabilityDate, $id]);
}
?>