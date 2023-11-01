<!DOCTYPE html>
<html>

<head>
    <title>Entity Choice</title>
</head>

<?php
session_start(); // Start the session to work with $_SESSION variables

if (isset($_SESSION['admin_email'])) {
    echo "<h1>Welcome to Your Dashboard, " . $_SESSION['admin_email'] . "</h1>";
    echo "<a href='/eCommerce-Project/QuickStays/index.php?entity=login&action=logout'>Logout</a>";
} else {
    echo "<p>Session not set. Please log in.</p>";
    echo "<a href='/eCommerce-Project/QuickStays/index.php?entity=login&action=login'>Login</a>";
}
?>

<body>
    <form method="GET" action="/eCommerce-Project/QuickStays/index.php">
        <label for="entity">Select Entity:</label>
        <select id="entity" name="entity">
            <option value="user" <?php if (isset($_GET['entity']) && $_GET['entity'] === 'user')
                echo 'selected'; ?>>User
            </option>

            <option value="property" <?php if (isset($_GET['entity']) && $_GET['entity'] === 'property')
                echo 'selected'; ?>>Property</option>

            <option value="admin" <?php if (isset($_GET['entity']) && $_GET['entity'] === 'admin')
                echo 'selected'; ?>>
                Admin</option>
        </select>
        <input type="hidden" name="action" value="list"> <!-- Set the action to "list" -->
        <button type="submit">Submit</button>
    </form>

</body>

</html>