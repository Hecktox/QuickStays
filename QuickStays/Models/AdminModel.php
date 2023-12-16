<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<?php
require_once 'db_connect.php';

class AdminModel
{
    public function getAdmins()
    {
        global $db;
        $query = $db->query("SELECT * FROM Users WHERE UserType IS NULL");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateAdmin($adminID, $firstName, $lastName, $email, $password, $isMaster)
    {
        global $db;
        $hashedPassword = md5($password);
        $query = $db->prepare("UPDATE Users SET FirstName=?, LastName=?, Email=?, Password=?, UserType=NULL, IsMaster=? WHERE UserID=? AND UserType IS NULL");
        $query->execute([$firstName, $lastName, $email, $hashedPassword, $isMaster, $adminID]);
    }

    public function getAdminByID($adminID)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM Users WHERE UserID = ? AND UserType IS NULL");
        $query->execute([$adminID]);
        $admin = $query->fetch(PDO::FETCH_ASSOC);

        return $admin;
    }

    public function addAdmin($firstName, $lastName, $email, $password, $isMaster)
    {
        global $db;
        $hashedPassword = md5($password);
        $query = $db->prepare("INSERT INTO Users (FirstName, LastName, Email, Password, IsMaster) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$firstName, $lastName, $email, $hashedPassword, $isMaster]);
    }

    public function deleteAdmin($adminID)
    {
        global $db;
        $query = $db->prepare("DELETE FROM Users WHERE UserID = ? AND UserType IS NULL");
        $query->execute([$adminID]);
    }
}
?>