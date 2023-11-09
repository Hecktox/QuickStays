<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<?php
require_once 'db_connect.php';

class BookingModel
{
    public function getBookings()
    {
        global $db;
        $query = $db->query("SELECT * FROM Bookings");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateBooking($bookingID, $checkInDate, $checkOutDate, $totalPrice, $status)
    {
        global $db;
        $query = $db->prepare("UPDATE Bookings SET CheckInDate=?, CheckOutDate=?, TotalPrice=?, Status=? WHERE BookingID=?");
        $query->execute([$checkInDate, $checkOutDate, $totalPrice, $status, $bookingID]);
    }

    public function getBookingByID($bookingID)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM Bookings WHERE BookingID = ?");
        $query->execute([$bookingID]);
        $booking = $query->fetch(PDO::FETCH_ASSOC);
        return $booking;
    }

    public function addBooking($userID, $propertyID, $checkInDate, $checkOutDate, $totalPrice, $status)
    {
        global $db;
        $query = $db->prepare("INSERT INTO Bookings (UserID, PropertyID, CheckInDate, CheckOutDate, TotalPrice, Status) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$userID, $propertyID, $checkInDate, $checkOutDate, $totalPrice, $status]);
    }

    public function deleteBooking($bookingID)
    {
        global $db;
        $query = $db->prepare("DELETE FROM Bookings WHERE BookingID = ?");
        $query->execute([$bookingID]);
    }
}
?>