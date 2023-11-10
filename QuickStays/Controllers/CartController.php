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
}
?>