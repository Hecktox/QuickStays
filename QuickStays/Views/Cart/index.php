<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <!-- Include Bootstrap CSS (you can adjust the URL to your specific version) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #fac534, #f58c22);
            color: #fff;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 20px;
        }

        .table {
            background-color: #fff;
        }

        .table th,
        .table td {
            color: #000;
        }

        .btn-primary {
            background-color: #ffffff;
            border-color: #ffffff;
            color: #fac534;
        }

        .btn-primary:hover {
            background-color: #f58c22;
            border-color: #f58c22;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Your Cart</h1>

        <?php
        // Check if there are pending bookings (carts) to display
        if (!empty($carts)):
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Total Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carts as $cart): ?>
                        <tr>
                            <td>
                                <?php echo $cart['CheckInDate']; ?>
                            </td>
                            <td>
                                <?php echo $cart['CheckOutDate']; ?>
                            </td>
                            <td>$
                                <?php echo $cart['TotalPrice']; ?>
                            </td>
                            <td>
                                <?php echo $cart['Status']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>

        <p class="text-center">Total Price: $
            <?php echo $totalPrice; ?>
        </p>

        <!-- Add a form for checkout -->
        <form method="post" action="/eCommerce-Project/QuickStays/index.php?entity=cart&action=checkout">
            <button type="submit" class="btn btn-primary btn-block">Checkout</button>
        </form><br>

        <a href="/eCommerce-Project/QuickStays/index.php?entity=cart&action=history" class="btn btn-primary btn-block">Booking History</a>
        <a href="/eCommerce-Project/QuickStays/index.php?entity=user&action=index" class="btn btn-primary btn-block">Home</a>


    </div>

    <!-- Include Bootstrap JS (you can adjust the URL to your specific version) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>