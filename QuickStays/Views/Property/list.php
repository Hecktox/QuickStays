<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<?php
session_start();

if (!isset($_SESSION['user_type'])) {
    // Redirect to the login page if the user type is not set
    header('Location: /eCommerce-Project/QuickStays/index.php?entity=login&action=index');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Property List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="display-4 mb-4">Property List</h1>
        <a href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=index' class="btn btn-secondary mb-2">Back to Entity Selection</a>
        <a href='/eCommerce-Project/QuickStays/index.php?entity=property&action=add' class="btn btn-primary mb-2">Add Property</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Property ID</th>
                    <th>Property Name</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Street Address</th>
                    <th>Description</th>
                    <th>Property Type</th>
                    <th>Num Rooms</th>
                    <th>Num Bathrooms</th>
                    <th>Availability Date</th>
                    <th>Price Per Night</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($properties as $property) {
                    echo "<tr>";
                    echo "<td>{$property['PropertyID']}</td>";
                    echo "<td>{$property['PropertyName']}</td>";
                    echo "<td>{$property['Country']}</td>";
                    echo "<td>{$property['City']}</td>";
                    echo "<td>{$property['Province']}</td>";
                    echo "<td>{$property['StreetAddress']}</td>";
                    echo "<td>{$property['Description']}</td>";
                    echo "<td>{$property['PropertyType']}</td>";
                    echo "<td>{$property['NumRooms']}</td>";
                    echo "<td>{$property['NumBathrooms']}</td>";
                    echo "<td>{$property['AvailabilityDate']}</td>";
                    echo "<td>{$property['PricePerNight']}</td>";
                    echo "<td><button onclick='editProperty({$property['PropertyID']})' class='btn btn-warning btn-sm'>Edit</button></td>";
                    echo "<td><button onclick='confirmDelete({$property['PropertyID']})' class='btn btn-danger btn-sm'>Delete</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function confirmDelete(propertyID) {
            if (confirm("Are you sure you want to delete this property?")) {
                window.location.href = "/eCommerce-Project/QuickStays/index.php?entity=property&action=delete&PropertyID=" + propertyID;
            }
        }

        function editProperty(propertyID) {
            window.location.href = "/eCommerce-Project/QuickStays/index.php?entity=property&action=edit&PropertyID=" + propertyID;
        }
    </script>
</body>

</html>
