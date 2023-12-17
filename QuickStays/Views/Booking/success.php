<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Success</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        echo '        </div>';
        echo '      </li>';
        echo '    </ul>';
        echo '  </div>';
        echo '</nav>';
    }
    ?>
    
    <div class="container mt-5">
        <h1>Booking Successful</h1>
        <p>Your booking has been confirmed. Thank you for choosing our service!</p>
        <a href="/eCommerce-Project/QuickStays/index.php?entity=cart&action=index"
            class="btn btn-primary btn-block">View Cart</a>
        <a href="/eCommerce-Project/QuickStays/index.php?entity=user&action=index"
            class="btn btn-primary btn-block">Home</a>

    </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>