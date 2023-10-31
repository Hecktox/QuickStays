<!DOCTYPE html>
<html>

<head>
    <title>Edit Property</title>
</head>

<body>
    <h1>Edit Property</h1>
    <!-- Display the property data for editing -->
    <form method="POST" action="list_page.php?entity=property&action=edit">
        <input type="hidden" name="PropertyID" value="<?php echo $property['PropertyID']; ?>">
        <label for="PropertyName">Property Name:</label>
        <input type="text" name="PropertyName" value="<?php echo $property['PropertyName']; ?>" required><br>

        <label for="Country">Country:</label>
        <input type="text" name="Country" value="<?php echo $property['Country']; ?>" required><br>

        <label for="City">City:</label>
        <input type="text" name="City" value="<?php echo $property['City']; ?>" required><br>

        <label for="Province">Province:</label>
        <input type="text" name="Province" value="<?php echo $property['Province']; ?>" required><br>

        <label for="StreetAddress">Street Address:</label>
        <input type="text" name="StreetAddress" value="<?php echo $property['StreetAddress']; ?>" required><br>

        <label for="Description">Description:</label>
        <textarea name="Description"><?php echo $property['Description']; ?></textarea><br>

        <label for="PropertyType">Property Type:</label>
        <select name="PropertyType">
            <option value="House" <?php if ($property['PropertyType'] === 'House')
                echo 'selected'; ?>>House</option>
            <option value="Apartment" <?php if ($property['PropertyType'] === 'Apartment')
                echo 'selected'; ?>>Apartment
            </option>
            <option value="Condo" <?php if ($property['PropertyType'] === 'Condo')
                echo 'selected'; ?>>Condo</option>
            <option value="Duplex" <?php if ($property['PropertyType'] === 'Duplex')
                echo 'selected'; ?>>Duplex</option>
        </select><br>

        <label for="NumRooms">Number of Rooms:</label>
        <input type="number" name="NumRooms" value="<?php echo $property['NumRooms']; ?>"><br>

        <label for="NumBathrooms">Number of Bathrooms:</label>
        <input type="number" name="NumBathrooms" value="<?php echo $property['NumBathrooms']; ?>"><br>

        <label for="AvailabilityDate">Availability Date:</label>
        <input type="date" name="AvailabilityDate" value="<?php echo $property['AvailabilityDate']; ?>"><br>

        <input type="submit" name="saveProperty" value="Save">
        <button type="button" onclick="window.location.href='list_page.php?entity=property&action=list'">Cancel</button>
    </form>
</body>

</html>