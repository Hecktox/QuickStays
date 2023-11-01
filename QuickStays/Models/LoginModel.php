<?php
require_once 'db_connect.php';

class LoginModel
{
    public function loginUser($email, $password)
    {
        global $db;
        $hashedPassword = md5($password);
        $query = $db->prepare("SELECT * FROM Users WHERE Email = ? AND Password = ?");
        $query->execute([$email, $hashedPassword]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function loginAdmin($email, $password)
    {
        global $db;
        $hashedPassword = md5($password);
        $query = $db->prepare("SELECT * FROM Admins WHERE Email = ? AND Password = ?");
        $query->execute([$email, $hashedPassword]);
        $admin = $query->fetch(PDO::FETCH_ASSOC);

        return $admin;
    }
}

?>