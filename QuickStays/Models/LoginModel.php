

<?php
require_once 'db_connect.php';

class LoginModel
{
    public function login($email, $password)
    {
        global $db;
        $hashedPassword = md5($password);
        $query = $db->prepare("SELECT * FROM Users WHERE Email = ? AND Password = ?");
        $query->execute([$email, $hashedPassword]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        } else {
            
            $query = $db->prepare("SELECT * FROM Users WHERE Email = ? AND Password = ? AND UserType IS NULL");
            $query->execute([$email, $hashedPassword]);
            $admin = $query->fetch(PDO::FETCH_ASSOC);
            
            return $admin;
        }
    }
}
?>
