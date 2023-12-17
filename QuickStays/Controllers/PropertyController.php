
<?php
require_once 'Models/PropertyModel.php';

class PropertyController
{
    public function list()
    {
        
        $propertyModel = new PropertyModel();
        $properties = $propertyModel->getProperties();
        include 'Views/Property/list.php';
    }

    public function edit()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveProperty'])) {
            
            $propertyID = $_POST['PropertyID'];
            $propertyModel = new PropertyModel();
            $property = $propertyModel->getPropertyByID($propertyID);

            
            if ($property) {
                $propertyName = $_POST['PropertyName'];
                $country = $_POST['Country'];
                $city = $_POST['City'];
                $province = $_POST['Province'];
                $streetAddress = $_POST['StreetAddress'];
                $description = $_POST['Description'];
                $propertyType = $_POST['PropertyType'];
                $numRooms = $_POST['NumRooms'];
                $numBathrooms = $_POST['NumBathrooms'];
                $availabilityDate = $_POST['AvailabilityDate'];
                $pricePerNight = $_POST['PricePerNight'];

                
                $propertyModel->updateProperty($propertyID, $propertyName, $country, $city, $province, $streetAddress, $description, $propertyType, $numRooms, $numBathrooms, $availabilityDate, $pricePerNight);
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=property&action=list');
                exit();
            } else {
                echo "<p>Property not found!</p>";
            }
        } elseif (isset($_GET['PropertyID'])) {
            $propertyID = $_GET['PropertyID'];
            $propertyModel = new PropertyModel();
            $property = $propertyModel->getPropertyByID($propertyID);

            if ($property) {
                include 'Views/Property/edit.php';
            } else {
                echo "<p>Property not found!</p>";
            }
        } else {
            echo "<p>Invalid Property ID!</p>";
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addProperty'])) {
            $PropertyName = $_POST['PropertyName'];
            $Country = $_POST['Country'];
            $City = $_POST['City'];
            $Province = $_POST['Province'];
            $StreetAddress = $_POST['StreetAddress'];
            $Description = $_POST['Description'];
            $PropertyType = $_POST['PropertyType'];
            $NumRooms = $_POST['NumRooms'];
            $NumBathrooms = $_POST['NumBathrooms'];
            $AvailabilityDate = $_POST['AvailabilityDate'];
            $pricePerNight = $_POST['PricePerNight'];

            $propertyModel = new PropertyModel();

            $propertyModel->addProperty($PropertyName, $Country, $City, $Province, $StreetAddress, $Description, $PropertyType, $NumRooms, $NumBathrooms, $AvailabilityDate, $pricePerNight);

            header('Location: /eCommerce-Project/QuickStays/index.php?entity=property&action=list');
            exit();
        } else {
            include 'Views/Property/add.php';
        }
    }

    public function delete()
    {
        if (isset($_GET['PropertyID'])) {
            $propertyID = $_GET['PropertyID'];
            $propertyModel = new PropertyModel();
            $property = $propertyModel->getPropertyByID($propertyID);

            if ($property) {
                $propertyModel->deleteProperty($propertyID);
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=property&action=list');
                exit();
            } else {
                echo "<p>Property not found!</p>";
            }
        } else {
            echo "<p>Invalid property ID!</p>";
        }
    }

    public function search()
{
    $propertyModel = new PropertyModel();

    
    if (isset($_GET['propertyType'])) {
        $propertyType = $_GET['propertyType'];

        $searchResults = $propertyModel->searchPropertiesByType($propertyType);

        $imageFilenames = [];
        foreach ($searchResults as &$property) {
            $propertyID = $property['PropertyID'];
            $imageFolder = "images/property/$propertyID";
            $thumbnail = "$imageFolder/1.jpg";
            $imageFilenames[$propertyID] = $thumbnail;
            $averageRating = $propertyModel->getAverageRatingForProperty($propertyID);
            $property['AverageRating'] = $averageRating;
        }
        unset($property);

        include 'Views/Property/index.php'; 
    }
    
    else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
        $destination = $_POST['destination'];
        $date = $_POST['date'];
        $guests = $_POST['guests'];

        $searchResults = $propertyModel->searchProperties($destination, $date, $guests);

        
        $imageFilenames = [];
        foreach ($searchResults as &$property) {
            $propertyID = $property['PropertyID'];
            $imageFolder = "images/property/$propertyID";
            $thumbnail = "$imageFolder/1.jpg";
            $imageFilenames[$propertyID] = $thumbnail;
            $averageRating = $propertyModel->getAverageRatingForProperty($propertyID);
            $property['AverageRating'] = $averageRating;
        }
        unset($property);

        include 'Views/Property/index.php'; 
    } else {
        
        header('Location: /eCommerce-Project/QuickStays/index.php?entity=property&action=list');
        exit();
    }
}


    public function book()
    {
        if (isset($_GET['PropertyID'])) {
            $propertyID = $_GET['PropertyID'];
            $propertyModel = new PropertyModel();
            $property = $propertyModel->getPropertyByID($propertyID);

            if ($property) {
                $imageFilenames = [];
                $imageFolder = "images/property/$propertyID";
                for ($i = 1; $i <= 3; $i++) {
                    $imageFilenames[] = "$imageFolder/$i.jpg";
                }

                include 'Views/Property/book.php';
            } else {
                echo "<p>Property not found!</p>";
            }
        } else {
            echo "<p>Invalid property ID!</p>";
        }
    }

    public function host()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hostProperty'])) {
            $PropertyName = $_POST['PropertyName'];
            $Country = $_POST['Country'];
            $City = $_POST['City'];
            $Province = $_POST['Province'];
            $StreetAddress = $_POST['StreetAddress'];
            $Description = $_POST['Description'];
            $PropertyType = $_POST['PropertyType'];
            $NumRooms = $_POST['NumRooms'];
            $NumBathrooms = $_POST['NumBathrooms'];
            $AvailabilityDate = $_POST['AvailabilityDate'];
            $PricePerNight = $_POST['PricePerNight'];

            $images = $_FILES;

            $propertyModel = new PropertyModel();

            $propertyID = $propertyModel->hostProperty($PropertyName, $Country, $City, $Province, $StreetAddress, $Description, $PropertyType, $NumRooms, $NumBathrooms, $AvailabilityDate, $PricePerNight, $images);

            
            header("Location: /eCommerce-Project/QuickStays/index.php?entity=property&action=book&PropertyID=$propertyID");
            exit();
        } else {
            include 'Views/Property/host.php';
        }
    }
}
?>