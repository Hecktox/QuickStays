<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #00000;">
        <h1>Login</h1>
        <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=login&action=login">
            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <input type="submit" name="login" value="Login">
        </form>
        <button type="button"
            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=user&action=register'">Not a
            Member? Register Here</button>
        <button onclick="window.location.href='/eCommerce-Project/QuickStays'">Cancel</button>
    </section>
</body>

</html>