<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<!DOCTYPE html>
<html>

<head>
    <title>Add Property</title>
</head>

<body>
    <h1>Add Property</h1>
    <!-- Form to add a new property -->
    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=property&action=add">
        <label for="PropertyName">Property Name:</label>
        <input type="text" name="PropertyName" required><br>

        <label for="Country">Country:</label>
        <input type="text" name="Country" required><br>

        <label for="City">City:</label>
        <input type="text" name="City" required><br>

        <label for="Province">Province:</label>
        <input type="text" name="Province" required><br>

        <label for="StreetAddress">Street Address:</label>
        <input type="text" name="StreetAddress" required><br>

        <label for="Description">Description:</label>
        <textarea name="Description" required></textarea><br>

        <label for="PropertyType">Property Type:</label>
        <select name="PropertyType">
            <option value="House">House</option>
            <option value="Apartment">Apartment</option>
            <option value="Condo">Condo</option>
            <option value="Duplex">Duplex</option>
        </select><br>

        <label for="NumRooms">Number of Rooms:</label>
        <input type="number" name="NumRooms" required><br>

        <label for="NumBathrooms">Number of Bathrooms:</label>
        <input type="number" name="NumBathrooms" required><br>

        <label for="AvailabilityDate">Availability Date:</label>
        <input type="date" name="AvailabilityDate" required><br>

        <input type="submit" name="addProperty" value="Add Property">
        <button type="button"
            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=property&action=list'">Cancel</button>
    </form>
</body>

</html>