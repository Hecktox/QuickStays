

<?php
session_start();

if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] !== 'Admin') {
    
    header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=index');
    exit();
} else if ($_SESSION['IsMaster'] !== 1) {
    
    echo '<script>';
    echo 'alert("You must be a master admin to access this page.");';
    echo 'window.location.href = "/eCommerce-Project/QuickStays/index.php?entity=admin&action=index";';
    echo '</script>';
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Admin</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/umd.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        
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
                <h1 class="mb-4 text-center">Add Admin</h1>
                <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=admin&action=add"
                    class="bg-white p-3 border rounded">
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" name="firstName" required>
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" name="lastName" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="isMaster">Is Master:</label>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="isMaster" name="isMaster" value="1">
                            <label class="form-check-label" for="isMaster">Yes</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="addAdmin" value="Add Admin">
                        <button type="button" class="btn btn-secondary"
                            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=admin&action=list'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>