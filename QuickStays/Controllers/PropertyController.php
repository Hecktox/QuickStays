<!-- 
    All I did here was change the file name and path 
    strings within the file to work with my stucture,
    and modified the edit() function to adapt 
    to the new database. - Maximus
-->

<?php
require_once 'Models/PropertyModel.php';

class PropertyController
{

    public function list()
    {
        $properties = getProperties();
        include 'Views/Property/list.php';
    }

    public function edit()
    {
        if (isset($_POST['save'])) {
            updateProperty(
                $_POST['PropertyID'],
                $_POST['PropertyName'],
                $_POST['Country'],
                $_POST['City'],
                $_POST['Province'],
                $_POST['StreetAddress'],
                $_POST['Description'],
                $_POST['PropertyType'],
                $_POST['NumRooms'],
                $_POST['NumBathrooms'],
                $_POST['AvailabilityDate']
            );
            header('Location: index.php?entity=property&action=list');
            exit;
        }

        if (!isset($_GET['PropertyID'])) {
            header('Location: index.php?entity=property&action=list');
            exit;
        }

        $property = getPropertyById($_GET['PropertyID']);
        include 'Views/Property/edit.php';
    }

}
?>