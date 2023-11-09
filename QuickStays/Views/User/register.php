<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>
    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=user&action=register">
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

        <input type="submit" name="registerUser" value="Register">
        <button onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=login&action=login'">Cancel</button>
    </form>
</body>

</html>