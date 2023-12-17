

<?php
require_once 'Models/UserModel.php';

class UserController
{
    public function index()
    {
        include 'Views/User/index.php';
    }

    public function list()
    {
        
        $userModel = new UserModel();
        $users = $userModel->getUsers();
        include 'Views/User/list.php';
    }

    public function edit()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveUser'])) {
            
            $userID = $_POST['userID'];
            $userModel = new UserModel();
            $user = $userModel->getUserByID($userID);

            
            if ($user) {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $userType = $_POST['userType'];

               
                $userModel->updateUser($userID, $firstName, $lastName, $email, $password, $userType);
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=list');
                exit();
            } else {
                echo "<p>User not found!</p>";
            }

            
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

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addUser'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userType = $_POST['userType'];

            
            $userModel = new UserModel();

            
            $userModel->addUser($firstName, $lastName, $email, $password, $userType);

            
            header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=list');
            exit();
        } else {
            include 'Views/User/add.php';
        }
    }

    public function delete()
    {
        if (isset($_GET['userID'])) {
            $userID = $_GET['userID'];
            $userModel = new UserModel();
            $user = $userModel->getUserByID($userID);

            if ($user) {
                $userModel->deleteUser($userID);
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=list');
                exit();
            } else {
                echo "<p>User not found!</p>";
            }
        } else {
            echo "<p>Invalid user ID!</p>";
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registerUser'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userType = $_POST['userType'];

            $userModel = new UserModel();
            $userModel->addUser($firstName, $lastName, $email, $password, $userType);

            
            header('Location: /eCommerce-Project/QuickStays/index.php?entity=login&action=login');
            exit();
        } else {
            include 'Views/User/register.php';
        }
    }
    public function faq(){
        include 'Views/User/faq.php';
    }
    public function contact(){
        include 'Views/User/contact.php';
    }
}
?>