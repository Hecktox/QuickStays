<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
</head>

<body>
    <h1>Add User</h1>
    <!-- Form to add a new user -->
    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=user&action=add">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="userType">User Type:</label>
        <select name="userType">
            <option value="Host">Host</option>
            <option value="Traveler">Traveler</option>
        </select><br>

        <input type="submit" name="addUser" value="Add User">
        <button type="button"
            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=user&action=list'">Cancel</button>
    </form>
</body>

</html>