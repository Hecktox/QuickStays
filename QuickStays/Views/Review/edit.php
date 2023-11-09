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
    <title>Edit Review</title>
</head>

<body>
    <h1>Edit Review</h1>
    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=review&action=edit">
        <input type="hidden" name="ReviewID" value="<?php echo $review['ReviewID']; ?>">
        <label for="PropertyID">Property ID:</label>
        <input type="number" name="PropertyID" value="<?php echo $review['PropertyID']; ?>" required><br>

        <label for="UserID">User ID:</label>
        <input type="number" name="UserID" value="<?php echo $review['UserID']; ?>" required><br>

        <label for="Rating">Rating:</label>
        <input type="number" step="0.1" name="Rating" value="<?php echo $review['Rating']; ?>" required><br>

        <label for="Comment">Comment:</label>
        <textarea name="Comment" required><?php echo $review['Comment']; ?></textarea><br>

        <input type="submit" name="saveReview" value="Save">
        <button type="button"
            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=review&action=list'">Cancel</button>
    </form>
</body>

</html>