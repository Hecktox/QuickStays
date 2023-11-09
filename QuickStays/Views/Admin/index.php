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
</head>

<?php
session_start();

if (isset($_SESSION['admin_email'])) {
    echo "<h1>Welcome to Your Dashboard, " . $_SESSION['admin_email'] . "</h1>";
    echo '<button onclick="window.location.href=\'/eCommerce-Project/QuickStays/index.php?entity=login&action=logout\';">Logout</button>';
 
    echo '<body>';
    echo '<form method="GET" action="/eCommerce-Project/QuickStays/index.php">';
    echo '<label for="entity">Select Entity:</label>';
    echo '<select id="entity" name="entity">';
    echo '<option value="user" ' . (isset($_GET['entity']) && $_GET['entity'] === 'user' ? 'selected' : '') . '>User</option>';
    echo '<option value="property" ' . (isset($_GET['entity']) && $_GET['entity'] === 'property' ? 'selected' : '') . '>Property</option>';
    echo '<option value="admin" ' . (isset($_GET['entity']) && $_GET['entity'] === 'admin' ? 'selected' : '') . '>Admin</option>';
    echo '<option value="booking" ' . (isset($_GET['entity']) && $_GET['entity'] === 'booking' ? 'selected' : '') . '>Booking</option>';
    echo '<option value="cart" ' . (isset($_GET['entity']) && $_GET['entity'] === 'cart' ? 'selected' : '') . '>Cart</option>';
    echo '<option value="review" ' . (isset($_GET['entity']) && $_GET['entity'] === 'review' ? 'selected' : '') . '>Review</option>';
    echo '</select>';
    echo '<input type="hidden" name="action" value="list">';
    echo '<button type="submit">Submit</button>';
    echo '</form>';
    echo '</body>';
} else {
    echo "<p>Session not set. Please log in.</p>";
    echo '<button onclick="window.location.href=\'/eCommerce-Project/QuickStays/index.php?entity=login&action=login\';">Login</button>';
}
?>

</html>
