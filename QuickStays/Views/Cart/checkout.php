<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (head section) ... -->
</head>
<body>
    <h1>Checkout</h1>
    
    <!-- Display user's cart items here -->
    <?php if (!empty($cartItems)): ?>
        <h2>Your Cart:</h2>
        <ul>
            <?php foreach ($cartItems as $cartItem): ?>
                <li>
                    Property: <?php echo $cartItem['PropertyID']; ?><br>
                    Booking Date: <?php echo $cartItem['BookingDate']; ?><br>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>

    <!-- Your payment form can go here -->
    <form method="post" action="/eCommerce-Project/QuickStays/index.php?entity=cart&action=processCheckout">
        <!-- Add your form fields for payment and user information -->
        <!-- Example: -->
        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number" required><br>

        <label for="expiration_date">Expiration Date:</label>
        <input type="text" id="expiration_date" name="expiration_date" required><br>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required><br>

        <input type="submit" name="checkout_submit" value="Submit Payment">
    </form>
</body>
</html>

