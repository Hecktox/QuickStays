

<?php
require_once 'db_connect.php';

class UserModel
{
    
    public function getUsers()
    {
        global $db;
        $query = $db->query("SELECT * FROM Users WHERE UserType IS NOT NULL");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateUser($userID, $firstName, $lastName, $email, $password, $userType)
    {
        global $db;
        $hashedPassword = md5($password);
        $query = $db->prepare("UPDATE Users SET FirstName=?, LastName=?, Email=?, Password=?, UserType=? WHERE UserID=? AND UserType IS NOT NULL");
        $query->execute([$firstName, $lastName, $email, $hashedPassword, $userType, $userID]);
    }

    public function getUserByID($userID)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM Users WHERE UserID = ? AND UserType IS NOT NULL");
        $query->execute([$userID]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function addUser($firstName, $lastName, $email, $password, $userType)
    {
        global $db;
        $hashedPassword = md5($password);
        $query = $db->prepare("INSERT INTO Users (FirstName, LastName, Email, Password, UserType) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$firstName, $lastName, $email, $hashedPassword, $userType]);
    }

    public function deleteUser($userID)
    {
        global $db;
        $query = $db->prepare("DELETE FROM Users WHERE UserID = ? AND UserType IS NOT NULL");
        $query->execute([$userID]);
    }

}
?>