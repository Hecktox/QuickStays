<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<?php
require_once 'Models/LoginModel.php';

class LoginController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $loginModel = new LoginModel();

            $user = $loginModel->loginUser($email, $password);
            $admin = $loginModel->loginAdmin($email, $password);

            if ($user) {
                // Start a session to manage user authentication
                session_start();

                // Store user information in a session variable
                $_SESSION['user_id'] = $user['UserID'];
                $_SESSION['user_email'] = $user['Email'];

                // Redirect to a user dashboard
                header('Location: /eCommerce-Project/QuickStays/Views/User/index.php');
                exit();
            } elseif ($admin) {
                // Start a session to manage admin authentication
                session_start();

                // Store admin information in a session variable
                $_SESSION['admin_id'] = $admin['AdminID'];
                $_SESSION['admin_email'] = $admin['Email'];

                // Redirect to an admin dashboard
                header('Location: /eCommerce-Project/QuickStays/Views/Admin/index.php');
                exit();
            } else {
                echo "<p>Invalid login credentials!</p>";
            }
        } else {
            include 'Views/Login/index.php';
        }
    }

    public function logout()
    {
        session_start(); // Start the session
        session_destroy(); // Destroy the session data

        header('Location: /eCommerce-Project/QuickStays/Views/User/index.php');
        exit();
    }
}

?>