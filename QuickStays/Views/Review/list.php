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
    <title>Review List</title>
</head>

<body>
    <h1>Review List</h1>
    <button onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=index'">Back to Entity
        Selection</button>
    <button onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=review&action=add'">Add
        Review</button>
    <table border="1">
        <tr>
            <th>Review ID</th>
            <th>Property ID</th>
            <th>User ID</th>
            <th>Rating</th>
            <th>Comment</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($reviews as $review) {
            echo "<tr>";
            echo "<td>{$review['ReviewID']}</td>";
            echo "<td>{$review['PropertyID']}</td>";
            echo "<td>{$review['UserID']}</td>";
            echo "<td>{$review['Rating']}</td>";
            echo "<td>{$review['Comment']}</td>";
            echo "<td><button onclick='editReview({$review['ReviewID']})'>Edit</button></td>";
            echo "<td><button onclick='confirmDelete({$review['ReviewID']})'>Delete</button></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <script>
        function confirmDelete(reviewID) {
            if (confirm("Are you sure you want to delete this review?")) {
                window.location.href = "/eCommerce-Project/QuickStays/index.php?entity=review&action=delete&ReviewID=" + reviewID;
            }
        }

        function editReview(reviewID) {
            window.location.href = "/eCommerce-Project/QuickStays/index.php?entity=review&action=edit&ReviewID=" + reviewID;
        }
    </script>
</body>

</html>