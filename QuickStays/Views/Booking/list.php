<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<?php
session_start();

if (!isset($_SESSION['admin_email'])) {
    header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=index');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Booking List</title>
</head>

<body>
    <h1>Booking List</h1>
    <button onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=index'">Back to Entity
        Selection</button>
    <button onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=booking&action=add'">Add
        Booking</button>
    <table border="1">
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
            echo "<td><button onclick='editBooking({$booking['BookingID']})'>Edit</button></td>";
            echo "<td><button onclick='confirmDelete({$booking['BookingID']})'>Delete</button></td>";
            echo "</tr>";
        }
        ?>
    </table>

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