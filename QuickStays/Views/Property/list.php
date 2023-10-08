<!-- 
    All I did here was change the file name to work with my stucture,
    and modified the form to adapt to the new database. - Maximus
-->
<h1>Property List</h1>
<table border="1">
    <tr>
        <th>Property Name</th>
        <th>Country</th>
        <th>City</th>
        <th>Province</th>
        <th>Street Address</th>
        <th>Description</th>
        <th>Property Type</th>
        <th>Number of Rooms</th>
        <th>Number of Bathrooms</th>
        <th>Availability Date</th>
        <th>Action</th>
    </tr>
    <?php foreach ($properties as $property): ?>
        <tr>
            <td>
                <?= $property['PropertyName'] ?>
            </td>
            <td>
                <?= $property['Country'] ?>
            </td>
            <td>
                <?= $property['City'] ?>
            </td>
            <td>
                <?= $property['Province'] ?>
            </td>
            <td>
                <?= $property['StreetAddress'] ?>
            </td>
            <td>
                <?= $property['Description'] ?>
            </td>
            <td>
                <?= $property['PropertyType'] ?>
            </td>
            <td>
                <?= $property['NumRooms'] ?>
            </td>
            <td>
                <?= $property['NumBathrooms'] ?>
            </td>
            <td>
                <?= $property['AvailabilityDate'] ?>
            </td>
            <td><a href="index.php?entity=property&action=edit&PropertyID=<?= $property['PropertyID'] ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
</table>