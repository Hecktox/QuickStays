

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

           
            $carts = $cartModel->getPendingBookingsByUserID($userID);

            // Calculate the total price
            $totalPrice = 0;
            foreach ($carts as $cart) {
                $totalPrice += $cart['TotalPrice'];
            }

            include 'Views/Cart/index.php';
        } else {
            
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

           
            $currentDate = date('Y-m-d H:i:s'); 

            
            $pendingBookings = $cartModel->getPendingBookingsByUserID($userID);

            foreach ($pendingBookings as $booking) {
                
                $bookingID = $booking['BookingID'];
                $cartModel->updateBookingStatus($bookingID, 'Confirmed');

                
                $propertyID = $booking['PropertyID'];
                $cartModel->addCart($userID, $propertyID, $currentDate);
            }

            
            header('Location: /eCommerce-Project/QuickStays/index.php?entity=cart&action=success');
            exit();
        } else {
            
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

            
            $bookingHistory = $cartModel->getCartsByUserID($userID);

            include 'Views/Cart/history.php'; 
        } else {
            
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