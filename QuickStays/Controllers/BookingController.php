

<?php
require_once 'Models/BookingModel.php';
require_once 'Models/PropertyModel.php';

class BookingController
{
    public function list()
    {
        $bookingModel = new BookingModel();
        $bookings = $bookingModel->getBookings();
        include 'Views/Booking/list.php';
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveBooking'])) {
            $bookingID = $_POST['BookingID'];
            $bookingModel = new BookingModel();
            $booking = $bookingModel->getBookingByID($bookingID);

            if ($booking) {
                $checkInDate = $_POST['CheckInDate'];
                $checkOutDate = $_POST['CheckOutDate'];
                $totalPrice = $_POST['TotalPrice'];
                $status = $_POST['Status'];

                $bookingModel->updateBooking($bookingID, $checkInDate, $checkOutDate, $totalPrice, $status);
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=booking&action=list');
                exit();
            } else {
                echo "<p>Booking not found!</p>";
            }
        } elseif (isset($_GET['BookingID'])) {
            $bookingID = $_GET['BookingID'];
            $bookingModel = new BookingModel();
            $booking = $bookingModel->getBookingByID($bookingID);

            if ($booking) {
                include 'Views/Booking/edit.php';
            } else {
                echo "<p>Booking not found!</p>";
            }
        } else {
            echo "<p>Invalid Booking ID!</p>";
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addBooking'])) {
            $userID = $_POST['UserID'];
            $propertyID = $_POST['PropertyID'];
            $checkInDate = $_POST['CheckInDate'];
            $checkOutDate = $_POST['CheckOutDate'];
            $totalPrice = $_POST['TotalPrice'];
            $status = $_POST['Status'];

            $bookingModel = new BookingModel();
            $bookingModel->addBooking($userID, $propertyID, $checkInDate, $checkOutDate, $totalPrice, $status);
            header('Location: /eCommerce-Project/QuickStays/index.php?entity=booking&action=list');
            exit();
        } else {
            include 'Views/Booking/add.php';
        }
    }

    public function delete()
    {
        if (isset($_GET['BookingID'])) {
            $bookingID = $_GET['BookingID'];
            $bookingModel = new BookingModel();
            $booking = $bookingModel->getBookingByID($bookingID);

            if ($booking) {
                $bookingModel->deleteBooking($bookingID);
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=booking&action=list');
                exit();
            } else {
                echo "<p>Booking not found!</p>";
            }
        } else {
            echo "<p>Invalid booking ID!</p>";
        }
    }

    public function book()
    {
        if (isset($_GET['PropertyID'])) {
            $propertyID = $_GET['PropertyID'];
            $propertyModel = new PropertyModel();
            $property = $propertyModel->getPropertyByID($propertyID);

            if ($property) {
                session_start();
                if (isset($_SESSION['user_id'])) {
                    $userID = $_SESSION['user_id'];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bookProperty'])) {
                        $checkInDate = $_POST['checkInDate'];
                        $checkOutDate = $_POST['checkOutDate'];
                        $bookingModel = new BookingModel();

                        $totalPrice = $bookingModel->calculateTotalPrice($propertyID, $checkInDate, $checkOutDate);

                        $status = 'Pending';

                        try {
                            $bookingModel->addBooking($userID, $propertyID, $checkInDate, $checkOutDate, $totalPrice, $status);

                            header("Location: /eCommerce-Project/QuickStays/index.php?entity=booking&action=success");
                            exit();
                        } catch (Exception $e) {
                            echo "<script>alert('Error: {$e->getMessage()}');</script>";
                        }
                    } else {
                        include 'Views/Property/book.php';
                    }
                } else {
                    header('Location: /eCommerce-Project/QuickStays/index.php?entity=login&action=login');
                    exit();
                }
            } else {
                echo "<p>Property not found!</p>";
            }
        } else {
            echo "<p>Invalid property ID!</p>";
        }
    }

    public function success() {
        include 'Views/Booking/success.php';
    }

}
?>