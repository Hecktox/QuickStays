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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/umd.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .carousel-item img {
            height: 300px;
            object-fit: cover;
        }

        .jumbotron {
            background-image: url('/eCommerce-Project/QuickStays/images/background.jpg');
            height: 400px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            position: relative;
        }

        .jumbotron .container {
            position: relative;
            z-index: 2;
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 20px;
            padding-right: 0px;

            background-color: rgba(255, 255, 255, 0.8);
            width: 40%;
            height: 180px;
            left: 0;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    // Check if the user is logged in
    if (isset($_SESSION['user_email'])) {
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
            <form class="form-inline" method="POST"
                action="/eCommerce-Project/QuickStays/index.php?entity=property&action=search">
                <input class="form-control mr-sm-2" type="search" name="destination" placeholder="Destination"
                    aria-label="Destination">
                <input class="form-control mr-sm-2" type="date" name="date" placeholder="Date" aria-label="Date">
                <input class="form-control mr-sm-2" type="number" name="guests" placeholder="# of Guests"
                    aria-label="Number of Guests">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
            </form>
        </div>
    </div>

    <div class="container">
        <h2>Find spaces that suit your style</h2>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <!-- First group of three items -->
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/eCommerce-Project/QuickStays/images/whiteHouse.jpg" class="d-block w-100"
                                alt="Town House">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Town House</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="/eCommerce-Project/QuickStays/images/luxuryHousee.jpg" class="d-block w-100"
                                alt="Luxury House">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Luxury House</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="/eCommerce-Project/QuickStays/images/beachHouse.jpg" class="d-block w-100"
                                alt="Beach House">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Beach House</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 2nd group of items-->
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/eCommerce-Project/QuickStays/images/cottage.jpg" class="d-block w-100"
                                alt="Luxury House">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Cottage</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="/eCommerce-Project/QuickStays/images/penthouse.jpeg" class="d-block w-100"
                                alt="Luxury House">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Penthouse</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="/eCommerce-Project/QuickStays/images/apartment.webp" class="d-block w-100"
                                alt="Luxury House">
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="service-box">

                    <h3>Best Prices</h3>
                    <p>Find the best deals for your stay.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">

                    <h3>24/7 Support</h3>
                    <p>Always there for you, any time, any place.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">

                    <h3>Unique Experiences</h3>
                    <p>Stay in unique homes across the world.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Happy Guests</h2>
        <div class="row">
            <!-- Testimonial 1 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">"This was the perfect place for our weekend getaway. Quickstays made
                            everything very easy for us! "</p>
                        <footer class="blockquote-footer">John Snow</footer>
                    </div>
                </div>
            </div>
            <!-- Testimonial 2 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">"Amazing experience from start to finish. The booking process was easy and
                            the stay exceeded our expectations."</p>
                        <footer class="blockquote-footer">Edward Scissorhands</footer>
                    </div>
                </div>
            </div>
            <!-- Testimonial 3 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">"We loved the location and the amenities provided. It felt like a home away
                            from home. We will definitely be back!"</p>
                        <footer class="blockquote-footer">Emily Johnson</footer>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Newsletter Subscription Form -->
    <div class="container mt-5">
        <h2>Stay Updated</h2>
        <form>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter your email">
                <button type="submit" class="btn btn-primary">Subscribe</button>
            </div>
        </form>
    </div>

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



</body>

</html>