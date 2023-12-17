<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking History</title>
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
        <h1 class="text-center">Booking History</h1>

        <?php if (!empty($bookingHistory)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Cart ID</th>
                        <th>Property ID</th>
                        <th>Booking Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookingHistory as $entry): ?>
                        <tr>
                            <td>
                                <?php echo $entry['CartID']; ?>
                            </td>
                            <td>
                                <?php echo $entry['PropertyID']; ?>
                            </td>
                            <td>
                                <?php echo $entry['BookingDate']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php else: ?>
            <p>Your booking history is empty.</p>
        <?php endif; ?>

        <a href="/eCommerce-Project/QuickStays/index.php?entity=cart&action=index"
            class="btn btn-primary btn-block">Back
            to Cart</a>
    </div>

    <!-- Include Bootstrap JS (you can adjust the URL to your specific version) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>