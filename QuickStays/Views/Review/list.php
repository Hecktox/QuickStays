<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<?php
session_start();

if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] !== 'Admin') {
    // Redirect to the login page if the user isn't logged in or if the user isn't an admin
    header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=index');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Review List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="display-4 mb-4">Review List</h1>
        <a href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=index' class="btn btn-secondary mb-2">Back to Entity Selection</a>
        <a href='/eCommerce-Project/QuickStays/index.php?entity=review&action=add' class="btn btn-primary mb-2">Add Review</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Review ID</th>
                    <th>Property ID</th>
                    <th>User ID</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($reviews as $review) {
                    echo "<tr>";
                    echo "<td>{$review['ReviewID']}</td>";
                    echo "<td>{$review['PropertyID']}</td>";
                    echo "<td>{$review['UserID']}</td>";
                    echo "<td>{$review['Rating']}</td>";
                    echo "<td>{$review['Comment']}</td>";
                    echo "<td><button onclick='editReview({$review['ReviewID']})' class='btn btn-warning btn-sm'>Edit</button></td>";
                    echo "<td><button onclick='confirmDelete({$review['ReviewID']})' class='btn btn-danger btn-sm'>Delete</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
