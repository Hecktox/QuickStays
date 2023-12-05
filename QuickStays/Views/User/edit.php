<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
 Philippe Ton-That
 2033640
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
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/umd.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

<body class="bg-light">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="mb-4 text-center">Edit User</h1>
                <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=user&action=edit" class="bg-white p-3 border rounded">
                    <input type="hidden" name="userID" value="<?php echo $user['UserID']; ?>">

                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" name="firstName" value="<?php echo $user['FirstName']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" name="lastName" value="<?php echo $user['LastName']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $user['Email']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" value="<?php echo $user['Password']; ?>" required>
                        <button type="button" class="btn btn-outline-primary mt-2" id="showPassword" onclick="togglePasswordVisibility()">Show Password</button>
                    </div>

                    <div class="form-group">
                        <label for="userType">User Type:</label>
                        <select name="userType" class="form-control">
                            <option value="Host" <?php if ($user['UserType'] === 'Host') echo 'selected'; ?>>Host</option>
                            <option value="Traveler" <?php if ($user['UserType'] === 'Traveler') echo 'selected'; ?>>Traveler</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="saveUser" value="Save">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=user&action=list'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>