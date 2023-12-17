

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Property</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
        .property-images img {
            width: 100%;
            height: auto;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    require_once 'Models/PropertyModel.php';
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
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=user&action=contact">Contact</a>';
        echo '        </div>';
        echo '      </li>';
        echo '    </ul>';
        echo '  </div>';
        echo '</nav>';
    } else {
        
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
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=user&action=contact">Contact</a>';
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=user&action=faq">FAQ</a>';
        echo '        </div>';
        echo '      </li>';
        echo '    </ul>';
        echo '  </div>';
        echo '</nav>';
    }
    ?>

    <?php

    ?>

    <div class="container my-4">
        
        <div id="propertyImagesCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner property-images">
                <?php foreach ($imageFilenames as $index => $imageFilename): ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="<?php echo $imageFilename; ?>" class="d-block w-100" alt="Property Image">
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#propertyImagesCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#propertyImagesCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        
        <?php if ($property): ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $property['PropertyName']; ?>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <?php echo $property['City'] . ', ' . $property['Country']; ?>
                    </h6>
                    <p class="card-text">
                        <?php  ?>
                    </p>
                </div>
            </div>

            
            <div class="mt-4">
                <h3>Book Your Stay</h3>
                <form method="POST"
                    action="/eCommerce-Project/QuickStays/index.php?entity=booking&action=book&PropertyID=<?php echo $property['PropertyID']; ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="checkInDate">Check-In Date:</label>
                            <input type="text" class="form-control datepicker" name="checkInDate" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="checkOutDate">Check-Out Date:</label>
                            <input type="text" class="form-control datepicker" name="checkOutDate" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="bookProperty">Book Property</button>
                </form>
            </div>


        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                Property not found.
            </div>
        <?php endif; ?>

        
        <div class="reviews-section mt-4">
            <h3>Guest Reviews</h3>

            <?php
            $propertyModel = new PropertyModel();
            $reviews = $propertyModel->getReviewsByPropertyId($property['PropertyID']);
            $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

            
            if ($userId && $propertyModel->hasUserBookedProperty($userId, $property['PropertyID'])):
                ?>
                
                <div class="review-form mt-4">
                    <h4>Add Your Review</h4>
                    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=review&action=add"
                        class="bg-white p-3 border rounded">
                        <div class="form-group">
                            <label for="PropertyID">Property ID:</label>
                            <input type="number" class="form-control" name="PropertyID" required>
                        </div>

                        <div class="form-group">
                            <label for="UserID">User ID:</label>
                            <input type="number" class="form-control" name="UserID" required>
                        </div>

                        <div class="form-group">
                            <label for="Rating">Rating:</label>
                            <input type="number" step="0.1" class="form-control" name="Rating" required>
                        </div>

                        <div class="form-group">
                            <label for="Comment">Comment:</label>
                            <textarea class="form-control" name="Comment" required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="addReview" value="Add Review">
                            <button type="button" class="btn btn-secondary"
                                onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=review&action=list'">Cancel</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>

            
            <?php if (!empty($reviews)): ?>
                <?php foreach ($reviews as $review): ?>
                    <div class="review">
                        <p><strong>
                                <?php echo htmlspecialchars($review['FirstName']) . ' ' . htmlspecialchars($review['LastName']); ?>:
                            </strong>
                            <?php echo htmlspecialchars($review['Comment']); ?>
                        </p>
                        <p>Rating:
                            <?php echo htmlspecialchars($review['Rating']); ?>/5
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No reviews yet.</p>
            <?php endif; ?>
        </div>






        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script>
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
            });
        </script>
</body>

<footer class="bg-light text-center text-lg-start mt-5">
    <div class="container p-4">

        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">QuickStays</h5>
                <p>
                    Making every stay a memorable one.
                </p>
            </div>
        </div>
    </div>
</footer>

</html>