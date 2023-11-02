<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
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

<body>
    <h1>Edit User</h1>
    <!-- Display the user data for editing -->
    <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=user&action=edit">
        <input type="hidden" name="userID" value="<?php echo $user['UserID']; ?>">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" value="<?php echo $user['FirstName']; ?>" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" value="<?php echo $user['LastName']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['Email']; ?>" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo $user['Password']; ?>" required>
        <button type="button" id="showPassword" onclick="togglePasswordVisibility()">Show Password</button><br>

        <label for="userType">User Type:</label>
        <select name="userType">
            <option value="Host" <?php if ($user['UserType'] === 'Host')
                echo 'selected'; ?>>Host</option>
            <option value="Traveler" <?php if ($user['UserType'] === 'Traveler')
                echo 'selected'; ?>>Traveler</option>
        </select><br>

        <input type="submit" name="saveUser" value="Save">
        <button type="button"
            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=user&action=list'">Cancel</button>
    </form>
</body>

</html>