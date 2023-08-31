<?php
session_start();

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
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Check if the user is a client
$sql = "SELECT * FROM clients WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['user'] = $username;
	  $_SESSION['user_type'] = $user_type;
        header("Location: index.php");
        //echo "login successful";
        //header("Location: client_dashboard.php");
    } else {
        echo "Invalid password";
    }
} else {
    // Check if the user is an admin
    $sql = "SELECT * FROM admins WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $username;
		$_SESSION['user_type'] = $user_type;
            echo "login successful";
		header("Location: index.php");
            //header("Location: admin_dashboard.php");
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid username";
    }
}

$conn->close();
?>
