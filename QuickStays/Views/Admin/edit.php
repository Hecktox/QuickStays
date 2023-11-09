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
<html>

<head>
    <title>Edit Admin</title>
    <script>
        // JavaScript function to toggle password visibility
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var showPasswordButton = document.getElementById("showPassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordButton.innerText = "Hide Password";
            } else {
                passwordInput.type = "password";
                showPasswordButton.innerText = "Show Password";
            }
        }
    </script>
</head>

</head>

<body>
    <h1>Edit Admin</h1>
    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=admin&action=edit">
        <input type="hidden" name="adminID" value="<?php echo $admin['AdminID']; ?>">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" value="<?php echo $admin['FirstName']; ?>" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" value="<?php echo $admin['LastName']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $admin['Email']; ?>" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo $admin['Password']; ?>" required>
        <button type="button" id="showPassword" onclick="togglePasswordVisibility()">Show Password</button><br>

        <input type="submit" name="saveAdmin" value="Save">
        <button type="button"
            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=list'">Cancel</button>
    </form>
</body>

</html>