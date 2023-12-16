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
        $errorMessage = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $loginModel = new LoginModel();

            $userOrAdmin = $loginModel->login($email, $password);

            if ($userOrAdmin) {
                session_start();
                $_SESSION['user_id'] = $userOrAdmin['UserID'];
                $_SESSION['user_email'] = $userOrAdmin['Email'];

                // Check the UserType and set it in the session
                if ($userOrAdmin['UserType'] === 'Host') {
                    $_SESSION['user_type'] = 'Host';
                    header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=index');
                } elseif ($userOrAdmin['UserType'] === 'Traveler') {
                    $_SESSION['user_type'] = 'Traveler';
                    header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=index');
                } else {
                    // UserType is null, indicating an admin
                    $_SESSION['user_type'] = 'Admin';
                    header('Location: /eCommerce-Project/QuickStays/index.php?entity=admin&action=index');
                }
                exit();
            } else {
                // Invalid login credentials, set the error message
                $errorMessage = 'Invalid login credentials!';
            }
        }

        include 'Views/Login/index.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=index');
        exit();
    }
}
?>