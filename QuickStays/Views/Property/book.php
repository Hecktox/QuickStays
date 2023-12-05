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
    <div class="container my-4">
        <!-- Images Carousel -->
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

        <!-- Property Details -->
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
                        <?php // Additional property details ?>
                    </p>
                </div>
            </div>

            <!-- Booking Form -->
            <div class="mt-4">
                <h3>Book Your Stay</h3>
                <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=booking&action=book">
                    <input type="hidden" name="propertyID" value="<?php echo $property['PropertyID']; ?>">

                    <!-- Date Selection -->
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

                    <!-- Guest Selection -->
                    <div class="form-group">
                        <label for="guests">Guests:</label>
                        <select class="form-control" id="guests" name="guests">
                            <!-- PHP code to generate guest options -->
                        </select>
                    </div>

                    <!-- Booking Button -->
                    <button type="submit" class="btn btn-primary">Book Property</button>
                </form>
            </div>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                Property not found.
            </div>
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