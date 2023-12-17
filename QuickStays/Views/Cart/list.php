
<?php
session_start();

if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] !== 'Admin') {
    
    header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=index');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="display-4 mb-4">Cart List</h1>
        <a href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=index' class="btn btn-secondary mb-2">Back to Entity Selection</a>
        <a href='/eCommerce-Project/QuickStays/index.php?entity=cart&action=add' class="btn btn-primary mb-2">Add Cart</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Cart ID</th>
                    <th>User ID</th>
                    <th>Property ID</th>
                    <th>Booking Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($carts as $cart) {
                    echo "<tr>";
                    echo "<td>{$cart['CartID']}</td>";
                    echo "<td>{$cart['UserID']}</td>";
                    echo "<td>{$cart['PropertyID']}</td>";
                    echo "<td>{$cart['BookingDate']}</td>";
                    echo "<td><button onclick='editCart({$cart['CartID']})' class='btn btn-warning btn-sm'>Edit</button></td>";
                    echo "<td><button onclick='confirmDelete({$cart['CartID']})' class='btn btn-danger btn-sm'>Delete</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
