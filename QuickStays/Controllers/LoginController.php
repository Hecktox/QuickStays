

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

                
                if ($userOrAdmin['UserType'] === 'Host') {
                    $_SESSION['user_type'] = 'Host';
                } elseif ($userOrAdmin['UserType'] === 'Traveler') {
                    $_SESSION['user_type'] = 'Traveler';
                } else {
                    
                    $_SESSION['user_type'] = 'Admin';

                    
                    if (isset($userOrAdmin['IsMaster'])) {
                        $_SESSION['IsMaster'] = $userOrAdmin['IsMaster'];
                    }
                }
                
                if ($_SESSION['user_type'] === 'Admin') {
                    header('Location: /eCommerce-Project/QuickStays/index.php?entity=admin&action=index');
                } else {
                    header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=index');
                }
                exit();
            } else {
                
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