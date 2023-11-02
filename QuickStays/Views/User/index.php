<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

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
        echo '<button onclick="window.location.href=\'/eCommerce-Project/QuickStays/index.php?entity=login&action=logout\';">Logout</button>';
    } else {
        echo "<p>Session not set. Please log in.</p>";
        echo '<button onclick="window.location.href=\'/eCommerce-Project/QuickStays/index.php?entity=login&action=login\';">Login</button>';
    }
    ?>

</body>

</html>