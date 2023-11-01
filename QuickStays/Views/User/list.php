<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
</head>

<body>
    <h1>User List</h1>
    <button onclick="window.location.href='/eCommerce-Project/QuickStays/Views/Admin/index.php';">Back to Entity
        Selection</button>
    <button onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=user&action=add'">Add
        User</button>
    <table border="1">
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
            echo "<td><button onclick='editUser({$user['UserID']})'>Edit</button></td>";
            echo "<td><button onclick='confirmDelete({$user['UserID']})'>Delete</button></td>";
            echo "</tr>";
        }
        ?>
    </table>

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