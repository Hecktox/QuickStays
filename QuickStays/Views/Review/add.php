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
                <h1 class="mb-4 text-center">Add Review</h1>
                <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=review&action=add" class="bg-white p-3 border rounded">
                    <div class="form-group">
                        <label for="PropertyID">Property ID:</label>
                        <input type="number" class="form-control" name="PropertyID" required>
                    </div>

                    <div class="form-group">
                        <label for="UserID">User ID:</label>
                        <input type="number" class="form-control" name="UserID" required>
                    </div>

                    <div class="form-group">
                        <label for="Rating">Rating:</label>
                        <input type="number" step="0.1" class="form-control" name="Rating" required>
                    </div>

                    <div class="form-group">
                        <label for="Comment">Comment:</label>
                        <textarea class="form-control" name="Comment" required></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="addReview" value="Add Review">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=review&action=list'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>