<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=login&action=login">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" name="login" value="Login">
    </form>
    <a href="/eCommerce-Project/QuickStays/index.php?entity=user&action=register">Not a Member? Register Here</a>
</body>

</html>