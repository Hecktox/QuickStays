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
<html lang="en">

<head>
    <title>Admin List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="display-4 mb-4">Admin List</h1>
        <a href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=index' class="btn btn-secondary mb-2">Back to Entity Selection</a>
        <a href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=add' class="btn btn-primary mb-2">Add Admin</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Admin ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Master</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($admins as $admin) {
                    echo "<tr>";
                    echo "<td>{$admin['AdminID']}</td>";
                    echo "<td>{$admin['FirstName']}</td>";
                    echo "<td>{$admin['LastName']}</td>";
                    echo "<td>{$admin['Email']}</td>";
                    echo "<td>{$admin['Password']}</td>";
                    echo "<td>{$admin['IsMaster']}</td>";
                    echo "<td><button onclick='editAdmin({$admin['AdminID']})' class='btn btn-warning btn-sm'>Edit</button></td>";
                    echo "<td><button onclick='confirmDelete({$admin['AdminID']})' class='btn btn-danger btn-sm'>Delete</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function confirmDelete(adminID) {
            if (confirm("Are you sure you want to delete this admin?")) {
                window.location.href = "/eCommerce-Project/QuickStays/index.php?entity=admin&action=delete&adminID=" + adminID;
            }
        }

        function editAdmin(adminID) {
            window.location.href = "/eCommerce-Project/QuickStays/index.php?entity=admin&action=edit&adminID=" + adminID;
        }
    </script>
</body>

</html>
