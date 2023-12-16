<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<?php
session_start();

if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] !== 'Admin') {
    // Redirect to the login page if the user isn't logged in or if the user isn't an admin
    header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=index');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booking List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="display-4 mb-4">Booking List</h1>
        <a href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=index' class="btn btn-secondary mb-2">Back to Entity Selection</a>
        <a href='/eCommerce-Project/QuickStays/index.php?entity=booking&action=add' class="btn btn-primary mb-2">Add Booking</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>User ID</th>
                    <th>Property ID</th>
                    <th>Check-In Date</th>
                    <th>Check-Out Date</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($bookings as $booking) {
                    echo "<tr>";
                    echo "<td>{$booking['BookingID']}</td>";
                    echo "<td>{$booking['UserID']}</td>";
                    echo "<td>{$booking['PropertyID']}</td>";
                    echo "<td>{$booking['CheckInDate']}</td>";
                    echo "<td>{$booking['CheckOutDate']}</td>";
                    echo "<td>{$booking['TotalPrice']}</td>";
                    echo "<td>{$booking['Status']}</td>";
                    echo "<td><button onclick='editBooking({$booking['BookingID']})' class='btn btn-warning btn-sm'>Edit</button></td>";
                    echo "<td><button onclick='confirmDelete({$booking['BookingID']})' class='btn btn-danger btn-sm'>Delete</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function confirmDelete(bookingID) {
            if (confirm("Are you sure you want to delete this booking?")) {
                window.location.href = "/eCommerce-Project/QuickStays/index.php?entity=booking&action=delete&BookingID=" + bookingID;
            }
        }

        function editBooking(bookingID) {
            window.location.href = "/eCommerce-Project/QuickStays/index.php?entity=booking&action=edit&BookingID=" + bookingID;
        }
    </script>
</body>

</html>
