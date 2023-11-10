<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<!DOCTYPE html>
<html>

<head>
    <title>Entity Choice</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Optional: Include Bootstrap JavaScript and its dependencies if you need interactive components -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/umd.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <?php
        session_start();
        // Header with conditional user display
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
        echo '  <a class="navbar-brand" href="/eCommerce-Project/QuickStays/Views/User/index.php">QuickStays</a>';
        echo '  <div class="collapse navbar-collapse" id="navbarNav">';
        echo '    <ul class="navbar-nav ml-auto">';
        if (isset($_SESSION['admin_email'])) {
            // Display admin email and logout option
            echo '      <li class="nav-item">';
            echo '        <span class="navbar-text mr-3">' . htmlspecialchars($_SESSION['admin_email']) . '</span>';
            echo '      </li>';
            echo '      <li class="nav-item">';
            echo '        <a class="nav-link" href="/eCommerce-Project/QuickStays/index.php?entity=login&action=logout">Logout</a>';
            echo '      </li>';
        } else {
            // Display login link
            echo '      <li class="nav-item">';
            echo '        <a class="nav-link" href="/eCommerce-Project/QuickStays/index.php?entity=login&action=login">Login</a>';
            echo '      </li>';
        }
        echo '    </ul>';
        echo '  </div>';
        echo '</nav>';

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
            echo '</div>'; // Close container
        }
        ?>
    </div>
</body>

</html>