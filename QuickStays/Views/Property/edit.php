<!-- 
    All I did here was change the file name to work with my stucture,
    and modified the form to adapt to the new database. - Maximus
-->
<h1>Edit Property</h1>
<form action="index.php?entity=property&action=edit&PropertyID=<?= $property['PropertyID'] ?>" method="post">
    <input type="hidden" name="PropertyID" value="<?= $property['PropertyID'] ?>">

    Property Name: <input type="text" name="PropertyName" value="<?= $property['PropertyName'] ?>"><br>

    Country: <input type="text" name="Country" value="<?= $property['Country'] ?>"><br>

    City: <input type="text" name="City" value="<?= $property['City'] ?>"><br>

    Province: <input type="text" name="Province" value="<?= $property['Province'] ?>"><br>

    Street Address: <input type="text" name="StreetAddress" value="<?= $property['StreetAddress'] ?>"><br>

    Description: <textarea name="Description"><?= $property['Description'] ?></textarea><br>

    Property Type:
    <select name="PropertyType">
        <option value="House" <?= ($property['PropertyType'] == 'House') ? 'selected' : '' ?>>House</option>
        <option value="Apartment" <?= ($property['PropertyType'] == 'Apartment') ? 'selected' : '' ?>>Apartment</option>
        <option value="Condo" <?= ($property['PropertyType'] == 'Condo') ? 'selected' : '' ?>>Condo</option>
        <option value="Duplex" <?= ($property['PropertyType'] == 'Duplex') ? 'selected' : '' ?>>Duplex</option>
    </select><br>

    Number of Rooms: <input type="number" name="NumRooms" value="<?= $property['NumRooms'] ?>"><br>

    Number of Bathrooms: <input type="number" name="NumBathrooms" value="<?= $property['NumBathrooms'] ?>"><br>

    Availability Date: <input type="date" name="AvailabilityDate" value="<?= $property['AvailabilityDate'] ?>"><br>

    <input type="submit" name="save" value="Save">
    <a href="index.php?entity=property&action=list">View Properties</a>

</form>