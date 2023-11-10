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

        $propertyID = $db->lastInsertId();

        // Create a folder for the property in the images/property directory
        $propertyFolder = "images/property/$propertyID";

        if (!file_exists($propertyFolder)) {
            mkdir($propertyFolder, 0777, true);
        }
    }

    public function deleteProperty($propertyID)
    {
        global $db;

        // Retrieve the property information before deletion
        $query = $db->prepare("SELECT * FROM Properties WHERE PropertyID = ?");
        $query->execute([$propertyID]);
        $property = $query->fetch(PDO::FETCH_ASSOC);

        if ($property) {
            // Delete the property from the database
            $deleteQuery = $db->prepare("DELETE FROM Properties WHERE PropertyID = ?");
            $deleteQuery->execute([$propertyID]);

            // Remove the corresponding folder in the images/property directory
            $propertyFolder = "images/property/$propertyID";
            if (file_exists($propertyFolder) && is_dir($propertyFolder)) {
                // Remove the folder and its contents
                $this->rrmdir($propertyFolder);
            }
        }
    }

    // Recursive function to remove a directory and its contents
    private function rrmdir($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir . "/" . $object)) {
                        $this->rrmdir($dir . "/" . $object);
                    } else {
                        unlink($dir . "/" . $object);
                    }
                }
            }
            rmdir($dir);
        }
    }


    public function searchProperties($destination, $date, $guests)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM Properties WHERE (City = ? OR Country = ?) AND AvailabilityDate >= ? AND NumRooms >= ?");
        $query->execute([$destination, $destination, $date, $guests]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>