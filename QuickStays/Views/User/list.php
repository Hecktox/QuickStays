<!--
 E-Commerce 
 Assignment01 Part03
 Maximus Taube
 2095310 
-->

<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
</head>

<body>
    <h1>User List</h1>
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>User Type</th>
            <th>Edit</th>
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
            echo "<td><a href='index.php?entity=user&action=edit&userID={$user['UserID']}'>Edit</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>