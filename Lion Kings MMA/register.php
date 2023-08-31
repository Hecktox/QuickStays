
<?php
// Database connection settings
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

// rest of your code...


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

// Encrypt password using password_hash
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the user into the appropriate table based on the user type
if ($user_type === 'client') {
    $sql = "INSERT INTO clients (username, password, email, first_name, last_name) VALUES ('$username', '$hashed_password', '$email', '$first_name', '$last_name')";
} elseif ($user_type === 'admin') {
    $sql = "INSERT INTO admins (username, password, email, first_name, last_name) VALUES ('$username', '$hashed_password', '$email', '$first_name', '$last_name')";
}

if (mysqli_query($conn, $sql)) {
    header("Location: login.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
