<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<!DOCTYPE html>
<html>

<head>
    <title>Property List</title>
</head>

<body>
    <h1>Property List</h1>
    <button onclick="window.location.href='/eCommerce-Project/QuickStays/Views/Admin/index.php';">Back to Entity
        Selection</button>
    <button onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=property&action=add'">Add
        Property</button>
    <table border="1">
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
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        // Loop through each property and display their information in a table row
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
            // Edit link with PropertyID as a parameter
            echo "<td><button onclick='editProperty({$property['PropertyID']})'>Edit</button></td>";
            echo "<td><button onclick='confirmDelete({$property['PropertyID']})'>Delete</button></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <script>
        // JavaScript function to confirm property deletion
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