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
    // Check if the user is logged in and is an admin
    if (isset($_SESSION['user_email']) && $_SESSION['user_type'] === 'Admin') {
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
        echo '<div class="container mt-5">';
        echo "<h1>Welcome, " . htmlspecialchars($_SESSION['user_email']) . "</h1>";
        echo "<p class='lead'>Here's your dashboard summary:</p>";
        // Example of adding summary stats (you'll need to replace these with real data)
        echo "<div class='row'>";
        echo "<div class='col-md-4'><div class='alert alert-info'>Total Users: <strong>123</strong></div></div>";
        echo "<div class='col-md-4'><div class='alert alert-success'>Properties: <strong>45</strong></div></div>";
        echo "</div>";

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

        echo '<div class="text-center mt-3">';
        echo '<a href="/eCommerce-Project/QuickStays/index.php?entity=admin&action=register" class="btn btn-primary btn-lg">Register Admin</a>';
        echo '</div>';
        echo "<div class='row'>";
        echo "<div class='col-md-8'>";
        echo "<h2>Dashboard User Guide</h2>";
        echo "<p data-toggle='tooltip' title='Use the dropdown to select the entity you wish to manage'>Select an entity from the dropdown to manage your data.</p>";
        echo "<p data-toggle='tooltip' title='Click submit to view the entity data'>Click submit to view the selected entity's data.</p>";
        echo "</div>";
        echo "<div class='col-md-4'>";
        echo "<h2>Recent Activity</h2>";
        echo "<h5>Recent Sign-ups</h5>";
        echo "<ul>";
    } else {
        // User is not logged in or not an admin, show a warning message and a login link
        echo '<div class="container mt-5">';
        echo '<div class="alert alert-warning" role="alert">';
        echo 'You are not authorized to access this page. Please log in as an admin.';
        echo '</div>';
        echo '<a href="/eCommerce-Project/QuickStays/index.php?entity=login&action=login" class="btn btn-primary">Login as Admin</a>';
        echo '</div>';
    }
    ?>
    </div>
</body>

</html>
