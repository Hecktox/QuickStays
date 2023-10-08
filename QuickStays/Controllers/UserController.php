<!--
 E-Commerce 
 Assignment01 Part03
 Maximus Taube
 2095310 
-->

<?php
require_once 'Models/UserModel.php';

class UserController
{
    public function list()
    {
        // Get the list of users from the database by creating an instance of the UserModel class
        $userModel = new UserModel();
        $users = $userModel->getUsers();
        include 'Views/User/list.php';
    }

    public function edit()
    {
        // Check if the form was submitted via request and button is clicked
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveUser'])) {
            // Gets UserID and create instance of UserModel to work with data
            $userID = $_POST['userID'];
            $userModel = new UserModel();
            $user = $userModel->getUserByID($userID);

            // Check if the user with the given userID exists
            if ($user) {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $userType = $_POST['userType'];

                // Update the user's data in the UserModel and displays success or error message if the user is found or not
                $userModel->updateUser($userID, $firstName, $lastName, $email, $password, $userType);
                echo "<p>User data updated successfully!</p>";
            } else {
                echo "<p>User not found!</p>";
            }

            // If not a POST request, check if userID is set in the GET request
        } elseif (isset($_GET['userID'])) {
            $userID = $_GET['userID'];
            $userModel = new UserModel();
            $user = $userModel->getUserByID($userID);

            if ($user) {
                include 'Views/User/edit.php';
            } else {
                echo "<p>User not found!</p>";
            }
        } else {
            echo "<p>Invalid user ID!</p>";
        }
    }
}
?>