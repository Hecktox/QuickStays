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
    <title>Edit Booking</title>
</head>

<body>
    <h1>Edit Booking</h1>
    <!-- Display the booking data for editing -->
    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=booking&action=edit">
        <input type="hidden" name="BookingID" value="<?php echo $booking['BookingID']; ?>">
        <label for="UserID">User ID:</label>
        <input type="number" name="UserID" value="<?php echo $booking['UserID']; ?>" required><br>

        <label for="PropertyID">Property ID:</label>
        <input type="number" name="PropertyID" value="<?php echo $booking['PropertyID']; ?>" required><br>

        <label for="CheckInDate">Check-In Date:</label>
        <input type="date" name="CheckInDate" value="<?php echo $booking['CheckInDate']; ?>" required><br>

        <label for="CheckOutDate">Check-Out Date:</label>
        <input type="date" name="CheckOutDate" value="<?php echo $booking['CheckOutDate']; ?>" required><br>

        <label for="TotalPrice">Total Price:</label>
        <input type="number" step="0.01" name="TotalPrice" value="<?php echo $booking['TotalPrice']; ?>" required><br>

        <label for="Status">Status:</label>
        <select name="Status">
            <option value="Pending" <?php if ($booking['Status'] === 'Pending')
                echo 'selected'; ?>>Pending</option>
            <option value="Confirmed" <?php if ($booking['Status'] === 'Confirmed')
                echo 'selected'; ?>>Confirmed</option>
            <option value="Cancelled" <?php if ($booking['Status'] === 'Cancelled')
                echo 'selected'; ?>>Cancelled</option>
        </select><br>

        <input type="submit" name="saveBooking" value="Save">
        <button type="button"
            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=booking&action=list'">Cancel</button>
    </form>
</body>

</html>