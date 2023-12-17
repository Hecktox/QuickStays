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
    </style>
</head>

<body>
<?php
    session_start();
    
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


    <div class="container">
        <h2>Contact Us</h2>
        <form action="/eCommerce-Project/QuickStays/index.php?controller=contact&action=submit" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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