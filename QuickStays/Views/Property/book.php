<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Property</title>
</head>

<body>
    <div class="container my-4">
        <h2 class="text-center mb-4">Property Details</h2>

        <?php if ($property) : ?>
            <div>
                <p>PropertyID: <?php echo $property['PropertyID']; ?></p>
                <p>PropertyName: <?php echo $property['PropertyName']; ?></p>
                <p>Country: <?php echo $property['Country']; ?></p>
                <p>City: <?php echo $property['City']; ?></p>
            </div>
        <?php else : ?>
            <div class="alert alert-warning" role="alert">
                Property not found.
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
