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
    <title>Entity Choice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/umd.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <?php
session_start();
// Check if the admin is logged in
if (isset($_SESSION['admin_email'])) {
    echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
    echo '  <a class="navbar-brand" href="/eCommerce-Project/QuickStays">QuickStays</a>';
    echo '  <div class="collapse navbar-collapse" id="navbarNav">';
    echo '    <ul class="navbar-nav ml-auto">';
    echo '      <li class="nav-item dropdown">';
    echo '        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
    echo '          ' . htmlspecialchars($_SESSION['admin_email']) . ''; 
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

    <div class="container mt-5">
<?php

        if (isset($_SESSION['admin_email'])) {
            echo '<div class="container mt-5">';
            echo "<h1>Welcome to Your Dashboard, " . htmlspecialchars($_SESSION['admin_email']) . "</h1>";

            echo '<form method="GET" action="/eCommerce-Project/QuickStays/index.php" class="mt-4">';
            echo '<div class="form-group">';
            echo '<label for="entity">Select Entity:</label>';
            echo '<select id="entity" name="entity" class="form-control">';
            echo '<option value="user" ' . (isset($_GET['entity']) && $_GET['entity'] === 'user' ? 'selected' : '') . '>User</option>';
            echo '<option value="property" ' . (isset($_GET['entity']) && $_GET['entity'] === 'property' ? 'selected' : '') . '>Property</option>';
            echo '<option value="admin" ' . (isset($_GET['entity']) && $_GET['entity'] === 'admin' ? 'selected' : '') . '>Admin</option>';
            echo '<option value="booking" ' . (isset($_GET['entity']) && $_GET['entity'] === 'booking' ? 'selected' : '') . '>Booking</option>';
            echo '<option value="cart" ' . (isset($_GET['entity']) && $_GET['entity'] === 'cart' ? 'selected' : '') . '>Cart</option>';
            echo '<option value="review" ' . (isset($_GET['entity']) && $_GET['entity'] === 'review' ? 'selected' : '') . '>Review</option>';
            echo '</select>';
            echo '</div>';
            echo '<input type="hidden" name="action" value="list">';
            echo '<button type="submit" class="btn btn-success">Submit</button>';
            echo '</form>';
        } else {
            echo '<div class="container mt-5">';
            echo '<div class="alert alert-warning" role="alert">';
            echo 'Session not set. Please log in.';
            echo '</div>';
            echo '<a href="/eCommerce-Project/QuickStays/index.php?entity=login&action=login" class="btn btn-primary">Login</a>';
            echo '</div>'; 
        }
        ?>
    </div>
</body>

</html>