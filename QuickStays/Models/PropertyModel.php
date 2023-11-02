<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<?php
require_once 'db_connect.php';

class PropertyModel
{
    public function getProperties()
    {
        global $db;
        $query = $db->query("SELECT * FROM Properties");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateProperty($propertyID, $propertyName, $country, $city, $province, $streetAddress, $description, $propertyType, $numRooms, $numBathrooms, $availabilityDate)
    {
        global $db;
        $query = $db->prepare("UPDATE Properties SET PropertyName=?, Country=?, City=?, Province=?, StreetAddress=?, Description=?, PropertyType=?, NumRooms=?, NumBathrooms=?, AvailabilityDate=? WHERE PropertyID=?");
        $query->execute([$propertyName, $country, $city, $province, $streetAddress, $description, $propertyType, $numRooms, $numBathrooms, $availabilityDate, $propertyID]);
    }

    public function getPropertyByID($propertyID)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM Properties WHERE PropertyID = ?");
        $query->execute([$propertyID]);
        $property = $query->fetch(PDO::FETCH_ASSOC);
        return $property;
    }

    public function addProperty($PropertyName, $Country, $City, $Province, $StreetAddress, $Description, $PropertyType, $NumRooms, $NumBathrooms, $AvailabilityDate)
    {
        global $db;
        $query = $db->prepare("INSERT INTO Properties (PropertyName, Country, City, Province, StreetAddress, Description, PropertyType, NumRooms, NumBathrooms, AvailabilityDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute([$PropertyName, $Country, $City, $Province, $StreetAddress, $Description, $PropertyType, $NumRooms, $NumBathrooms, $AvailabilityDate]);
    }

    public function deleteProperty($propertyID)
    {
        global $db;
        $query = $db->prepare("DELETE FROM Properties WHERE PropertyID = ?");
        $query->execute([$propertyID]);
    }

}
?>