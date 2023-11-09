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
    <title>Add Booking</title>
</head>

<body>
    <h1>Add Booking</h1>
    <!-- Form to add a new booking -->
    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=booking&action=add">
        <label for="UserID">User ID:</label>
        <input type="number" name="UserID" required><br>

        <label for="PropertyID">Property ID:</label>
        <input type="number" name="PropertyID" required><br>

        <label for="CheckInDate">Check-In Date:</label>
        <input type="date" name="CheckInDate" required><br>

        <label for="CheckOutDate">Check-Out Date:</label>
        <input type="date" name="CheckOutDate" required><br>

        <label for="TotalPrice">Total Price:</label>
        <input type="number" step="0.01" name="TotalPrice" required><br>

        <label for="Status">Status:</label>
        <select name="Status">
            <option value="Pending">Pending</option>
            <option value="Confirmed">Confirmed</option>
            <option value="Cancelled">Cancelled</option>
        </select><br>

        <input type="submit" name="addBooking" value="Add Booking">
        <button type="button"
            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=booking&action=list'">Cancel</button>
    </form>
</body>

</html>