<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<?php
require_once 'db_connect.php';

class CartModel
{
    public function getCarts()
    {
        global $db;
        $query = $db->query("SELECT * FROM Cart");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateCart($cartID, $userID, $propertyID, $bookingDate)
    {
        global $db;
        $query = $db->prepare("UPDATE Cart SET UserID=?, PropertyID=?, BookingDate=? WHERE CartID=?");
        $query->execute([$userID, $propertyID, $bookingDate, $cartID]);
    }

    public function getCartByID($cartID)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM Cart WHERE CartID = ?");
        $query->execute([$cartID]);
        $cart = $query->fetch(PDO::FETCH_ASSOC);
        return $cart;
    }

    public function addCart($userID, $propertyID, $bookingDate)
    {
        global $db;
        $query = $db->prepare("INSERT INTO Cart (UserID, PropertyID, BookingDate) VALUES (?, ?, ?)");
        $query->execute([$userID, $propertyID, $bookingDate]);
    }

    public function deleteCart($cartID)
    {
        global $db;
        $query = $db->prepare("DELETE FROM Cart WHERE CartID = ?");
        $query->execute([$cartID]);
    }

    public function getCartsByUserID($userID)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM Cart WHERE UserID = ?");
        $query->execute([$userID]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPendingBookingsByUserID($userID)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM Bookings WHERE UserID = ? AND Status = 'Pending'");
        $query->execute([$userID]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateBookingStatus($bookingID, $status)
    {
        global $db;
        $query = $db->prepare("UPDATE Bookings SET Status = ? WHERE BookingID = ?");
        $query->execute([$status, $bookingID]);
    }

}
