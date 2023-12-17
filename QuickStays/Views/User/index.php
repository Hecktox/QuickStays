<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
 Philippe Ton-That
 2033640
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
            background-image: url('/eCommerce-Project/QuickStays/images/backgroundd.jpg');
            height: 500px;
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

        .service-icon {
            max-width: 100%;
            height: auto;
            display: block;
            max-height: 100px;
        }

        .service-box {
            text-align: center;
            padding: 30px;
            transition: transform 0.3s;
        }

        .service-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .custom-btn {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 18px;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-decoration: none;
        }

        .custom-btn:hover {
            background-color: #ffff;
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>

<body>
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
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=user&action=contact">Contact</a>';
        echo '        </div>';
        echo '      </li>';
        // Add Cart button here
        echo '      <li class="nav-item">';
        echo '        <a class="nav-link" href="/eCommerce-Project/QuickStays/index.php?entity=cart&action=index">Cart</a>';
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
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=user&action=contact">Contact</a>';
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=user&action=faq">FAQ</a>';
        echo '        </div>';
        echo '      </li>';
        // Add Cart button here
        echo '      <li class="nav-item">';
        echo '        <a class="nav-link" href="/eCommerce-Project/QuickStays/index.php?entity=cart&action=index">Cart</a>';
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
        <div class="text-center mt-4">
            <?php
            if (isset($_SESSION['user_email']) && $_SESSION['user_type'] === 'Host') {
                echo '<a href="/eCommerce-Project/QuickStays/index.php?entity=property&action=host" class="custom-btn">Host a Property</a>';
            } else if (isset($_SESSION['user_email']) && $_SESSION['user_type'] === 'Admin') {
                echo '<a href="/eCommerce-Project/QuickStays/index.php?entity=admin&action=index" class="custom-btn">Admin Page</a>';
            }
            ?>
        </div>
    </div>

    <div class="container">
        <h2>Find spaces that suit your style</h2>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <!-- First group of three items -->
                <div class="carousel-item active">
                    <div class="row">
                        <!-- Apartment -->
                        <div class="col-md-4">
                            <a
                                href="/eCommerce-Project/QuickStays/index.php?entity=property&action=search&propertyType=Apartment">
                                <img src="/eCommerce-Project/QuickStays/images/whiteHouse.jpg" class="d-block w-100"
                                    alt="Apartment">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Apartment</h5>
                                </div>
                            </a>
                        </div>
                        <!-- Condo -->
                        <div class="col-md-4">
                            <a
                                href="/eCommerce-Project/QuickStays/index.php?entity=property&action=search&propertyType=Condo">
                                <img src="/eCommerce-Project/QuickStays/images/luxuryHousee.jpg" class="d-block w-100"
                                    alt="Condo">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Condo</h5>
                                </div>
                            </a>
                        </div>
                        <!-- House -->
                        <div class="col-md-4">
                            <a
                                href="/eCommerce-Project/QuickStays/index.php?entity=property&action=search&propertyType=House">
                                <img src="/eCommerce-Project/QuickStays/images/beachHouse.jpg" class="d-block w-100"
                                    alt="House">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>House</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 2nd group of items -->
                <div class="carousel-item">
                    <div class="row">
                        <!-- Cottage -->
                        <div class="col-md-4">
                            <a
                                href="/eCommerce-Project/QuickStays/index.php?entity=property&action=search&propertyType=House">
                                <img src="/eCommerce-Project/QuickStays/images/cottage.jpg" class="d-block w-100"
                                    alt="Cottage">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>House</h5>
                                </div>
                            </a>
                        </div>
                        <!-- Penthouse -->
                        <div class="col-md-4">
                            <a
                                href="/eCommerce-Project/QuickStays/index.php?entity=property&action=search&propertyType=Condo">
                                <img src="/eCommerce-Project/QuickStays/images/penthouse.jpeg" class="d-block w-100"
                                    alt="Penthouse">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Condo</h5>
                                </div>
                            </a>
                        </div>
                        <!-- Luxury Apartment -->
                        <div class="col-md-4">
                            <a
                                href="/eCommerce-Project/QuickStays/index.php?entity=property&action=search&propertyType=Apartment">
                                <img src="/eCommerce-Project/QuickStays/images/apartment.webp" class="d-block w-100"
                                    alt="Luxury Apartment">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Luxury Apartment</h5>
                                </div>
                            </a>
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
        <!-- Services -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="service-box">
                        <img src="/eCommerce-Project/QuickStays/images/dollar.png" alt="Best Prices"
                            class="service-icon img-fluid">
                        <h3>Best Prices</h3>
                        <p>Find the best deals for your stay.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box">
                        <img src="/eCommerce-Project/QuickStays/images/support.png" alt="Best Prices"
                            class="service-icon img-fluid">
                        <h3>24/7 Support</h3>
                        <p>Always there for you, any time, any place.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box">
                        <img src="/eCommerce-Project/QuickStays/images/happy.png" alt="Best Prices"
                            class="service-icon img-fluid">
                        <h3>Unique Experiences</h3>
                        <p>Stay in unique homes across the world.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="cta-section d-flex align-items-center justify-content-center"
                        style="background: url('/eCommerce-Project/QuickStays/images/home.webp') no-repeat center center; background-size: cover; height: 400px;">
                        <div class="text-center text-white" style="background: rgba(0, 0, 0, 0.5); padding: 20px;">
                            <h2>List your property on QuickStays and open your door to rental income</h2>
                            <p class="my-3">Earn money by renting out your vacation home, unused apartment, or extra
                                room.
                            </p>
                            <a href="/eCommerce-Project/QuickStays/index.php?entity=user&action=register"
                                class="btn btn-primary">Become A Host</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informational paragraphs -->
            <div class="container  mt-4">
                <div class="row">
                    <div class="col-12">
                        <h2>Discover millions of rental options with QuickStays</h2>
                        <p>For many travellers, a hotel just doesn’t cut it for a family trip or romantic couple’s
                            retreat.
                            Fortunately, QuickStays offers a diverse range of different vacation rentals that are
                            suitable
                            for all destinations and lifestyles, from idyllic cottages and quiet mountain chalets to
                            waterfront homes and lakeside cabins. A world of possibilities awaits with a quick
                            QuickStays
                            property search, which shows you a list of millions of property rentals from private
                            homeowners
                            all over the world. Once you find your dream rental in your favourite destination, you can
                            quickly and securely book the property to get your vacation planning started.</p>
                        <h3>What can a vacation rental do for you?</h3>
                        <p>Whether you’re embarking on a thrill-seeking excursion or looking for a quiet couple’s trip
                            by
                            the sea, vacation rentals are available in virtually every size and type. You can find
                            cottages,
                            cabins, lodges, houses, apartments, and more, all with a range of amenities to help you make
                            the
                            most of your trip. With a vacation rental, you can enjoy features like pet-friendly yards or
                            gardens, pools and hot tubs, outdoor grilling, and entertainment space, all in the comfort
                            of
                            your own home-away-from-home. Best of all, you can find rentals for virtually any budget,
                            with
                            amenities that help you save, such as kitchens and entertainment features.</p>

                    </div>

                </div>

            </div>

            <!-- Reviews/testimonials -->
            <div class="container mt-5">
                <h2 class="text-center mb-4">Happy Guests</h2>
                <div class="row">
                    <!-- Testimonial 1 -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">"This was the perfect place for our weekend getaway. Quickstays
                                    made
                                    everything very easy for us! "</p>
                                <footer class="blockquote-footer">John Snow</footer>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">"Amazing experience from start to finish. The booking process was
                                    easy
                                    and
                                    the stay exceeded our expectations."</p>
                                <footer class="blockquote-footer">Edward Scissorhands</footer>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 3 -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">"We loved the location and the amenities provided. It felt like a
                                    home
                                    away
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