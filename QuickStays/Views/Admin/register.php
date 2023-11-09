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
    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=admin&action=register">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" name="registerAdmin" value="Register">
        <button onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=index;">Cancel</button>
    </form>
</body>

</html>