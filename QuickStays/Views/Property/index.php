<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
 Philippe Ton-That
 2033640
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .property-card {
            border-radius: 15px;
            margin-bottom: 20px;
            height: 380px;
            transition: transform 0.3s ease-in-out;
        }

        .property-card img {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .property-card .card-body {
            padding: 10px;
        }

        .property-card-container {
            position: relative;
            overflow: hidden;
        }

        .property-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php
    session_start();
    // Check if the user is logged in
    if (isset($_SESSION['user_email'])) {
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
        echo '  <a class="navbar-brand" href="/eCommerce-Project/QuickStays">QuickStays</a>';
        echo '  <div class="collapse navbar-collapse" id="navbarNav">';
        echo '    <ul class="navbar-nav ml-auto">';
        echo '      <li class="nav-item dropdown">';
        echo '        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        echo '          ' . htmlspecialchars($_SESSION['user_email']) . '';
        echo '        </a>';
        echo '        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=login&action=logout">Log out</a>';
        echo '        </div>';
        echo '      </li>';
        echo '    </ul>';
        echo '  </div>';
        echo '</nav>';
    } else {
        // User is not logged in, show the Login and Sign up links
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
        echo '  <a class="navbar-brand" href="/eCommerce-Project/QuickStays/Views/User/index.php">QuickStays</a>';
        echo '  <div class="collapse navbar-collapse" id="navbarNav">';
        echo '    <ul class="navbar-nav ml-auto">';
        echo '      <li class="nav-item dropdown">';
        echo '        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        echo '          Account';
        echo '        </a>';
        echo '        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=login&action=login">Login</a>';
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=user&action=register">Sign Up</a>';
        echo '        </div>';
        echo '      </li>';
        echo '    </ul>';
        echo '  </div>';
        echo '</nav>';
    }
    ?>
    <div class="container my-4">
        <h2 class="text-center mb-4">Search Results</h2>

        <div class="row">
            <?php foreach ($searchResults as $property): ?>
                <?php
                $propertyID = $property['PropertyID'];
                $averageRating = $property['AverageRating'];
                $bookingURL = "/eCommerce-Project/QuickStays/index.php?entity=property&action=book&PropertyID=$propertyID";
                ?>
                <div class="col-md-3">
                    <div class="property-card-container" onclick="redirectToBooking('<?php echo $bookingURL; ?>')">
                        <div class="card property-card">
                            <img src="<?php echo $imageFilenames[$propertyID]; ?>" alt="Property Image">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $property['PropertyName']; ?>
                                    <?php echo number_format($averageRating, 1) . '&nbsp;&#9733;'; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $property['StreetAddress'] . ', ' . $property['City'] . ', ' . $property['Country']; ?>
                                </p>
                                <p class="card-text">
                                    <?php
                                    $numRooms = $property['NumRooms'];
                                    $numBathrooms = $property['NumBathrooms'];

                                    $roomText = ($numRooms == 1) ? 'room' : 'rooms';
                                    $bathroomText = ($numBathrooms == 1) ? 'bathroom' : 'bathrooms';

                                    echo $numRooms . ' ' . $roomText . ', ' . $numBathrooms . ' ' . $bathroomText;
                                    ?>
                                </p>
                                <p class="card-text">
                                    <?php echo 'Available on ' . $property['AvailabilityDate']; ?>
                                </p>
                                <p class="card-text">
                                    <?php echo '$' . $property['PricePerNight'] . ' CAD per night'; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <script>
                function redirectToBooking(bookingURL) {
                    window.location.href = bookingURL;
                }
            </script>
        </div>

        <?php if (empty($searchResults)): ?>
            <div class="alert alert-warning" role="alert">
                No properties found matching the search criteria.
            </div>
        <?php endif; ?>
    </div>


    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="container p-4">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">QuickStays</h5>
                    <p>Making every stay a memorable one.</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>