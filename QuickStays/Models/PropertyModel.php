

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

    public function updateProperty($propertyID, $propertyName, $country, $city, $province, $streetAddress, $description, $propertyType, $numRooms, $numBathrooms, $availabilityDate, $pricePerNight)
    {
        global $db;
        $query = $db->prepare("UPDATE Properties SET PropertyName=?, Country=?, City=?, Province=?, StreetAddress=?, Description=?, PropertyType=?, NumRooms=?, NumBathrooms=?, AvailabilityDate=?, PricePerNight=? WHERE PropertyID=?");
        $query->execute([$propertyName, $country, $city, $province, $streetAddress, $description, $propertyType, $numRooms, $numBathrooms, $availabilityDate, $pricePerNight, $propertyID]);
    }

    public function getPropertyByID($propertyID)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM Properties WHERE PropertyID = ?");
        $query->execute([$propertyID]);
        $property = $query->fetch(PDO::FETCH_ASSOC);
        return $property;
    }

    public function addProperty($PropertyName, $Country, $City, $Province, $StreetAddress, $Description, $PropertyType, $NumRooms, $NumBathrooms, $AvailabilityDate, $PricePerNight)
    {
        global $db;

        $query = $db->prepare("INSERT INTO Properties (PropertyName, Country, City, Province, StreetAddress, Description, PropertyType, NumRooms, NumBathrooms, AvailabilityDate, PricePerNight) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute([$PropertyName, $Country, $City, $Province, $StreetAddress, $Description, $PropertyType, $NumRooms, $NumBathrooms, $AvailabilityDate, $PricePerNight]);

        $propertyID = $db->lastInsertId();

        
        $propertyFolder = "images/property/$propertyID";

        if (!file_exists($propertyFolder)) {
            mkdir($propertyFolder, 0777, true);
        }
    }

    public function deleteProperty($propertyID)
    {
        global $db;

        
        $query = $db->prepare("SELECT * FROM Properties WHERE PropertyID = ?");
        $query->execute([$propertyID]);
        $property = $query->fetch(PDO::FETCH_ASSOC);

        if ($property) {
            
            $deleteQuery = $db->prepare("DELETE FROM Properties WHERE PropertyID = ?");
            $deleteQuery->execute([$propertyID]);

            
            $propertyFolder = "images/property/$propertyID";
            if (file_exists($propertyFolder) && is_dir($propertyFolder)) {
                
                $this->rrmdir($propertyFolder);
            }
        }
    }

    
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

    public function searchPropertiesByType($propertyType)
{
    global $db;
    $query = $db->prepare("SELECT * FROM Properties WHERE PropertyType = ?");
    $query->execute([$propertyType]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

    public function getAverageRatingForProperty($propertyID)
    {
        global $db;
        $query = $db->prepare("SELECT IFNULL(AVG(Rating), 0) AS AvgRating FROM Reviews WHERE PropertyID = ?");
        $query->execute([$propertyID]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['AvgRating'];
    }

    public function getReviewsByPropertyId($propertyId)
    {
        global $db;
        $query = $db->prepare("SELECT Reviews.Rating, Reviews.Comment, Users.FirstName, Users.LastName 
                            FROM Reviews 
                            JOIN Users ON Reviews.UserID = Users.UserID 
                            WHERE Reviews.PropertyID = ?");
        $query->execute([$propertyId]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hasUserBookedProperty($userId, $propertyId)
    {
        global $db; 
        $query = $db->prepare("SELECT COUNT(*) FROM Bookings WHERE UserID = ? AND PropertyID = ? AND Status = 'Confirmed'");
        $query->execute([$userId, $propertyId]);
        return $query->fetchColumn() > 0;
    }

    public function hostProperty($PropertyName, $Country, $City, $Province, $StreetAddress, $Description, $PropertyType, $NumRooms, $NumBathrooms, $AvailabilityDate, $PricePerNight, $images)
    {
        global $db;

        
        $this->addProperty($PropertyName, $Country, $City, $Province, $StreetAddress, $Description, $PropertyType, $NumRooms, $NumBathrooms, $AvailabilityDate, $PricePerNight);

        
        $propertyID = $db->lastInsertId();

        
        for ($i = 1; $i <= 3; $i++) {
            $imageField = "Image$i";
            if (isset($images[$imageField]) && !empty($images[$imageField]['name'])) {
                $imageName = "$i.jpg";
                $imagePath = "images/property/$propertyID/$imageName";
                move_uploaded_file($images[$imageField]['tmp_name'], $imagePath);
            }
        }

        return $propertyID;
    }
}
?>