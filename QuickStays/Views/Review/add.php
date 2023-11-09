<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<?php
session_start();

if (!isset($_SESSION['admin_email'])) {
    header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=index');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Review</title>
</head>

<body>
    <h1>Add Review</h1>
    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=review&action=add">
        <label for="PropertyID">Property ID:</label>
        <input type="number" name="PropertyID" required><br>

        <label for="UserID">User ID:</label>
        <input type="number" name="UserID" required><br>

        <label for="Rating">Rating:</label>
        <input type="number" step="0.1" name="Rating" required><br>

        <label for="Comment">Comment:</label>
        <textarea name="Comment" required></textarea><br>

        <input type="submit" name="addReview" value="Add Review">
        <button type="button"
            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=review&action=list'">Cancel</button>
    </form>
</body>

</html>