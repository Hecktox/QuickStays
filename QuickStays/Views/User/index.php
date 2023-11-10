<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->



<!DOCTYPE html>
<html>

<head>
<title>Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Bootstrap Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css">
    <!-- Include Bootstrap JavaScript and its dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/umd.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .carousel-item img {
            height: 300px; 
            object-fit: cover; /* This will prevent stretching and just cover the space */
        }
    </style>
</head>

<body>
    <?php
    session_start(); // Start the session to work with $_SESSION variables
    
    // Check if the user is logged in
    if (isset($_SESSION['user_email'])) {
        // Logged in user's email is in the session, display it
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
        echo '  <a class="navbar-brand" href="#">QuickStays</a>';
        echo '  <div class="collapse navbar-collapse" id="navbarNav">';
        echo '    <ul class="navbar-nav ml-auto">';
        echo '      <li class="nav-item">';
        echo '        <a class="nav-link" href="#">' . htmlspecialchars($_SESSION['user_email']) . '</a>';
        echo '      </li>';
        echo '      <li class="nav-item">';
        echo '        <a class="nav-link" href="/eCommerce-Project/QuickStays/index.php?entity=login&action=logout">Logout</a>';
        echo '      </li>';
        echo '    </ul>';
        echo '  </div>';
        echo '</nav>';
    } else {
        // User is not logged in, show the Login link
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
        echo '  <a class="navbar-brand" href="#">QuickStays</a>';
        echo '  <div class="collapse navbar-collapse" id="navbarNav">';
        echo '    <ul class="navbar-nav ml-auto">';
        echo '      <li class="nav-item">';
        echo '        <a class="nav-link" href="/eCommerce-Project/QuickStays/index.php?entity=login&action=login">Login</a>';
        echo '      </li>';
        echo '    </ul>';
        echo '  </div>';
        echo '</nav>';
    }
    ?>
     <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Find your perfect getaway</h1>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Destination" aria-label="Destination">
                <input class="form-control mr-sm-2" type="date" placeholder="Date" aria-label="Date">
                <input class="form-control mr-sm-2" type="number" placeholder="# of Guests" aria-label="Number of Guests">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>

    <!-- Add a section for featured spaces -->
    <div class="container">
    <h2>Find spaces that suit your style</h2>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <!-- Bootstrap carousel items -->
        <div class="carousel-inner">
            <!-- First group of three items -->
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-4">
                        <img src="/eCommerce-Project/QuickStays/images/whiteHouse.jpg" class="d-block w-100" alt="Town House">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Town House</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/eCommerce-Project/QuickStays/images/luxuryHousee.jpg" class="d-block w-100" alt="Luxury House">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Luxury House</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/eCommerce-Project/QuickStays/images/beachHouse.jpg" class="d-block w-100" alt="Beach House">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Beach House</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Additional groups of three items as new .carousel-item elements -->
            <!-- Example for the second group -->
             <div class="carousel-item">
                <div class="row">
                    <div class="col-md-4">
                        <img src="/eCommerce-Project/QuickStays/images/cottage.jpg" class="d-block w-100" alt="Luxury House">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Cottage</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/eCommerce-Project/QuickStays/images/penthouse.jpeg" class="d-block w-100" alt="Luxury House">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Penthouse</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/eCommerce-Project/QuickStays/images/apartment.webp" class="d-block w-100" alt="Luxury House">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Penthouse</h5>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Carousel Controls -->
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

    <!-- End of featured spaces section -->

</body>

</html>