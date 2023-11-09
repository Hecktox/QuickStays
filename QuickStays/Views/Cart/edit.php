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
    <title>Edit Cart</title>
</head>

<body>
    <h1>Edit Cart</h1>
    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=cart&action=edit">
        <input type="hidden" name="CartID" value="<?php echo $cart['CartID']; ?>">
        <label for="UserID">User ID:</label>
        <input type="number" name="UserID" value="<?php echo $cart['UserID']; ?>" required><br>

        <label for="PropertyID">Property ID:</label>
        <input type="number" name="PropertyID" value="<?php echo $cart['PropertyID']; ?>" required><br>

        <label for="BookingDate">Booking Date:</label>
        <input type="date" name="BookingDate" value="<?php echo $cart['BookingDate']; ?>" required><br>

        <input type="submit" name="saveCart" value="Save">
        <button type="button"
            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=cart&action=list'">Cancel</button>
    </form>
</body>

</html>