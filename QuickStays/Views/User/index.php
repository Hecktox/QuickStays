<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <?php
    session_start(); // Start the session to work with $_SESSION variables
    
    if (isset($_SESSION['user_email'])) {
        echo "<h1>Welcome to Your Dashboard, " . $_SESSION['user_email'] . "</h1>";
        echo "<a href='/eCommerce-Project/QuickStays/index.php?entity=login&action=logout'>Logout</a>";
    } else {
        echo "<p>Session not set. Please log in.</p>";
        echo "<a href='/eCommerce-Project/QuickStays/index.php?entity=login&action=login'>Login</a>";
    }
    ?>

</body>

</html>