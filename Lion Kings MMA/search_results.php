<?php
// Database connection
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    // Running locally, connect with IP address
    $servername = "34.152.10.238";
} else {
    // Running on the cloud, connect with /cloudsql/ path
    $servername = "/cloudsql/lions-king:northamerica-northeast1:lions-king";
}
$username = "root";
$password = "SuperServer12";
$dbname = "gym_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search term from GET request
$search_term = $_GET['search_query'];

$search_term = $conn->real_escape_string($search_term);

$sql = "SELECT * FROM class WHERE title LIKE '%$search_term%'";
$result = $conn->query($sql);

// Output navigation bar HTML
echo '
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style-class.css">
</head>
<body>
    <section class="header">
        <nav>
            <div class="nav-links" id="navLinks">
                <ul>
                    <a href="index.php"> <img src="images/tablogo.png" width="100"> </a>
                    <div class="list">
                        <li><a href="about.html">ABOUT</a></li>
                        <li><a href="contact.html">CONTACT</a></li>
                        <li><a href="class.html">CLASS</a></li>
                        <li><a href="cal.html">CALENDAR</a></li>
            <div class="no-gi" onclick="showClass()">
                        <li><a href="cart.html">CART</a></li>
                        <li><a href="login.html">ACCOUNT</a></li>
                        <form action="search_results.php" method="get">
                            <input type="text" name="search_query" placeholder="Search for classes...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </ul>
            </div>
        </nav>
    </section>
';

echo '<section><div class="block">';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="class">';
        echo '<br>';
        echo '<img src="images/image.png" alt="" width="400px" height="400px">';
        echo '<h2>'. $row["title"]. '</h2>';
        echo '<br>';
        echo '<a class="learn">Learn More</a>';
        echo '<a class="apply" href="cart.html">Apply Now</a>';
        echo '</div>';
    }
} else {
    echo '0 results';
}

echo '</div></section>';

echo '
</body>
</html>
';

$conn->close();
?>



