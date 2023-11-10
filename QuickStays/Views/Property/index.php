<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>

<body>
    <h2>Search Results</h2>

    <?php if (!empty($searchResults)) : ?>
        <table>
            <thead>
                <tr>
                    <th>PropertyID</th>
                    <th>PropertyName</th>
                    <th>Country</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($searchResults as $property) : ?>
                    <tr>
                        <td><?php echo $property['PropertyID']; ?></td>
                        <td><?php echo $property['PropertyName']; ?></td>
                        <td><?php echo $property['Country']; ?></td>
                        <td><?php echo $property['City']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No properties found matching the search criteria.</p>
    <?php endif; ?>
</body>

</html>
