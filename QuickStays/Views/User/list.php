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
    <title>User List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="display-4 mb-4">User List</h1>
        <a href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=index' class="btn btn-secondary mb-2">Back to Entity Selection</a>
        <a href='/eCommerce-Project/QuickStays/index.php?entity=user&action=add' class="btn btn-primary mb-2">Add User</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>User Type</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each user and display their information in a table row
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>{$user['UserID']}</td>";
                    echo "<td>{$user['FirstName']}</td>";
                    echo "<td>{$user['LastName']}</td>";
                    echo "<td>{$user['Email']}</td>";
                    echo "<td>{$user['Password']}</td>";
                    echo "<td>{$user['UserType']}</td>";
                    // Edit link with User ID as a parameter uses index to load controller
                    echo "<td><a href='#' onclick='editUser({$user['UserID']})' class='btn btn-warning btn-sm'>Edit</a></td>";
                    echo "<td><a href='#' onclick='confirmDelete({$user['UserID']})' class='btn btn-danger btn-sm'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // JavaScript function to confirm user deletion
        function confirmDelete(userID) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = "/eCommerce-Project/QuickStays/index.php?entity=user&action=delete&userID=" + userID;
            }
        }

        function editUser(userID) {
            window.location.href = "/eCommerce-Project/QuickStays/index.php?entity=user&action=edit&userID=" + userID;
        }
    </script>
</body>

</html>

