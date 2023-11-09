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
    <title>Cart List</title>
</head>

<body>
    <h1>Cart List</h1>
    <button onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=index'">Back to Entity
        Selection</button>
    <button onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=cart&action=add'">Add
        Cart</button>
    <table border="1">
        <tr>
            <th>Cart ID</th>
            <th>User ID</th>
            <th>Property ID</th>
            <th>Booking Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($carts as $cart) {
            echo "<tr>";
            echo "<td>{$cart['CartID']}</td>";
            echo "<td>{$cart['UserID']}</td>";
            echo "<td>{$cart['PropertyID']}</td>";
            echo "<td>{$cart['BookingDate']}</td>";
            echo "<td><button onclick='editCart({$cart['CartID']})'>Edit</button></td>";
            echo "<td><button onclick='confirmDelete({$cart['CartID']})'>Delete</button></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <script>
        function confirmDelete(cartID) {
            if (confirm("Are you sure you want to delete this cart?")) {
                window.location.href = "/eCommerce-Project/QuickStays/index.php?entity=cart&action=delete&CartID=" + cartID;
            }
        }

        function editCart(cartID) {
            window.location.href = "/eCommerce-Project/QuickStays/index.php?entity=cart&action=edit&CartID=" + cartID;
        }
    </script>
</body>

</html>