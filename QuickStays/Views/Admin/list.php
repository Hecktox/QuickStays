<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<!DOCTYPE html>
<html>

<head>
    <title>Admin List</title>
</head>

<body>
    <h1>Admin List</h1>
    <button onclick="window.location.href='/eCommerce-Project/QuickStays/Views/Admin/index.php';">Back to Entity
        Selection</button>
    <button onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=add'">Add
        Admin</button>
    <table border="1">
        <tr>
            <th>Admin ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($admins as $admin) {
            echo "<tr>";
            echo "<td>{$admin['AdminID']}</td>";
            echo "<td>{$admin['FirstName']}</td>";
            echo "<td>{$admin['LastName']}</td>";
            echo "<td>{$admin['Email']}</td>";
            echo "<td>{$admin['Password']}</td>";
            echo "<td><button onclick='editAdmin({$admin['AdminID']})'>Edit</button></td>";
            echo "<td><button onclick='confirmDelete({$admin['AdminID']})'>Delete</button></td>";
            echo "</tr>";
        }
        ?>
    </table>

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