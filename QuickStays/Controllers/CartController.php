<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<?php
require_once 'Models/CartModel.php';

class CartController
{
    public function list()
    {
        $cartModel = new CartModel();
        $carts = $cartModel->getCarts();
        include 'Views/Cart/list.php';
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveCart'])) {
            $cartID = $_POST['CartID'];
            $cartModel = new CartModel();
            $cart = $cartModel->getCartByID($cartID);

            if ($cart) {
                $userID = $_POST['UserID'];
                $propertyID = $_POST['PropertyID'];
                $bookingDate = $_POST['BookingDate'];

                $cartModel->updateCart($cartID, $userID, $propertyID, $bookingDate);
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=cart&action=list');
                exit();
            } else {
                echo "<p>Cart not found!</p>";
            }
        } elseif (isset($_GET['CartID'])) {
            $cartID = $_GET['CartID'];
            $cartModel = new CartModel();
            $cart = $cartModel->getCartByID($cartID);

            if ($cart) {
                include 'Views/Cart/edit.php';
            } else {
                echo "<p>Cart not found!</p>";
            }
        } else {
            echo "<p>Invalid Cart ID!</p>";
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addCart'])) {
            $userID = $_POST['UserID'];
            $propertyID = $_POST['PropertyID'];
            $bookingDate = $_POST['BookingDate'];

            $cartModel = new CartModel();
            $cartModel->addCart($userID, $propertyID, $bookingDate);

            header('Location: /eCommerce-Project/QuickStays/index.php?entity=cart&action=list');
            exit();
        } else {
            include 'Views/Cart/add.php';
        }
    }

    public function delete()
    {
        if (isset($_GET['CartID'])) {
            $cartID = $_GET['CartID'];
            $cartModel = new CartModel();
            $cart = $cartModel->getCartByID($cartID);

            if ($cart) {
                $cartModel->deleteCart($cartID);
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=cart&action=list');
                exit();
            } else {
                echo "<p>Cart not found!</p>";
            }
        } else {
            echo "<p>Invalid Cart ID!</p>";
        }
    }

    public function checkout()
    {
        session_start();

        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            // Redirect to the login page or display an error message
            header('Location: /eCommerce-Project/QuickStays/index.php?entity=login&action=login');
            exit();
        }

        $userID = $_SESSION['user_id'];

        // Fetch the user's cart items from the database using the user ID
        $cartModel = new CartModel();
        $cartItems = $cartModel->getCartsByUserID($userID);

        // Load the checkout view with the cart items
        include 'Views/Cart/checkout.php';
    }


    public function processCheckout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout_submit'])) {
            // Here, you can add code to process the payment and create a booking record in the database.
            // You'll need to handle the payment processing logic using a mock payment API or a real payment gateway.
            // Once the payment is successful, create a booking record and remove items from the cart.

            // Example:
            $cardNumber = $_POST['card_number'];
            $expirationDate = $_POST['expiration_date'];
            $cvv = $_POST['cvv'];

            // Process the payment using the mock payment API or a real payment gateway.

            // Create a booking record in the database.
            $userID = $_SESSION['UserID']; // You may need to retrieve the user ID from the session.
            $propertyID = $_SESSION['PropertyID']; // You may need to retrieve the property ID from the session.
            $bookingDate = date("Y-m-d"); // Use the current date as the booking date.

            $cartModel = new CartModel();
            $cartModel->addCart($userID, $propertyID, $bookingDate);

            // Redirect to a success page or display a success message.
            header('Location: /eCommerce-Project/QuickStays/index.php?entity=cart&action=checkoutSuccess');
            exit();
        } else {
            // Handle invalid checkout request.
            echo "<p>Invalid Checkout Request!</p>";
        }
    }
}
?>