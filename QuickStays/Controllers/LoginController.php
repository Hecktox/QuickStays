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
        $errorMessage = ''; // Initialize an empty error message

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $loginModel = new LoginModel();

            $user = $loginModel->loginUser($email, $password);
            $admin = $loginModel->loginAdmin($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['UserID'];
                $_SESSION['user_email'] = $user['Email'];
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=index');
                exit();
            } elseif ($admin) {
                session_start();
                $_SESSION['admin_id'] = $admin['AdminID'];
                $_SESSION['admin_email'] = $admin['Email'];
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=admin&action=index');
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

