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

if (!isset($_SESSION['user_type'])) {
    // Redirect to the login page if the user type is not set
    header('Location: /eCommerce-Project/QuickStays/index.php?entity=login&action=index');
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
                <h1 class="mb-4 text-center">Edit Admin</h1>
                <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=admin&action=edit"
                    class="bg-white p-3 border rounded">
                    <input type="hidden" name="adminID" value="<?php echo $admin['UserID']; ?>">

                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" name="firstName"
                            value="<?php echo $admin['FirstName']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" name="lastName"
                            value="<?php echo $admin['LastName']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $admin['Email']; ?>"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password"
                            value="<?php echo $admin['Password']; ?>" required>
                        <button type="button" class="btn btn-outline-primary mt-2" id="showPassword"
                            onclick="togglePasswordVisibility()">Show Password</button>
                    </div>

                    <div class="form-group">
                        <label for="isMaster">Is Master:</label>
                        <div class="form-check form-check-inline">
                            <input type="hidden" name="isMaster" value="0">
                            <input type="checkbox" class="form-check-input" id="isMaster" name="isMaster" value="1"
                                <?php echo ($admin['IsMaster'] == 1) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="isMaster">Yes</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="saveAdmin" value="Save">
                        <button type="button" class="btn btn-secondary"
                            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=list'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>