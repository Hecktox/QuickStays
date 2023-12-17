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

    public function index()
    {
        session_start();
        if (isset($_SESSION['user_id'])) {
            $userID = $_SESSION['user_id'];
            $cartModel = new CartModel();

            // Retrieve the user's pending bookings using the new function
            $carts = $cartModel->getPendingBookingsByUserID($userID);

            // Calculate the total price
            $totalPrice = 0;
            foreach ($carts as $cart) {
                $totalPrice += $cart['TotalPrice'];
            }

            include 'Views/Cart/index.php';
        } else {
            // User is not logged in, you can handle this case as needed
            // Redirect to the login page or display an error message
            header('Location: /eCommerce-Project/QuickStays/index.php?entity=login&action=login');
            exit();
        }
    }

    public function checkout()
    {
        session_start();

        if (isset($_SESSION['user_id'])) {
            $userID = $_SESSION['user_id'];
            $cartModel = new CartModel();

            // Calculate the current date and time
            $currentDate = date('Y-m-d H:i:s'); // Format as needed

            // Retrieve the user's pending bookings
            $pendingBookings = $cartModel->getPendingBookingsByUserID($userID);

            foreach ($pendingBookings as $booking) {
                // Update the status of the booking to "Confirmed"
                $bookingID = $booking['BookingID'];
                $cartModel->updateBookingStatus($bookingID, 'Confirmed');

                // Add the booking with the current date to the cart table
                $propertyID = $booking['PropertyID'];
                $cartModel->addCart($userID, $propertyID, $currentDate);
            }

            // Redirect to the cart page after checkout
            header('Location: /eCommerce-Project/QuickStays/index.php?entity=cart&action=success');
            exit();
        } else {
            // User is not logged in, handle as needed
            header('Location: /eCommerce-Project/QuickStays/index.php?entity=login&action=login');
            exit();
        }
    }

    public function history()
    {
        session_start();

        if (isset($_SESSION['user_id'])) {
            $userID = $_SESSION['user_id'];
            $cartModel = new CartModel();

            // Retrieve the user's booking history (cart entries)
            $bookingHistory = $cartModel->getCartsByUserID($userID);

            include 'Views/Cart/history.php'; // Create the history view
        } else {
            // User is not logged in, handle as needed
            header('Location: /eCommerce-Project/QuickStays/index.php?entity=login&action=login');
            exit();
        }
    }

    public function success()
    {
        include 'Views/Cart/success.php';
    }
}
?>