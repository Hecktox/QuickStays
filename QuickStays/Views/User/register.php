

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #fac534, #f58c22);
            color: #ffff;
            margin: 0;
            padding: 0;
            height: 90vh;

        }

        .gradient-form {
            padding: 20px;
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #ffffff;
            border-color: #ffffff;
            color: #fac534;
        }

        .btn-primary:hover {
            background-color: #f58c22;
            border-color: #f58c22;
            color: #ffff;
        }

        .register-link {
            color: #ffffff !important;
            transition: color 0.3s ease-in-out;
        }

        .register-link:hover {
            color: #f58c22 !important;
            text-decoration: none;
        }

        .form-control {
            border-radius: 20px;
            color: #fac534;
        }

        .form-control::placeholder {
            color: #fac534;
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
        echo '    </ul>';
        echo '  </div>';
        echo '</nav>';
    }
    ?>

    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
                <div class="gradient-form text-center p-4">
                    <h1 class="mb-4">Register</h1>
                    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=user&action=register">
                        <div class="form-group">
                            <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="userType">
                                <option value="Host">Host</option>
                                <option value="Traveler">Traveler</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block rounded-pill" name="registerUser">Register</button>
                    </form>
                    <p class="mt-3">
                        <a href="/eCommerce-Project/QuickStays/index.php?entity=login&action=login"
                            class="register-link">Already a Member? Login Here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
