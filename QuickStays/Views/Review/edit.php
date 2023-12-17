

<?php
session_start();

if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] !== 'Admin') {
    
    header('Location: /eCommerce-Project/QuickStays/index.php?entity=user&action=index');
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
                <h1 class="mb-4 text-center">Edit Review</h1>
                <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=review&action=edit" class="bg-white p-3 border rounded">
                    <input type="hidden" name="ReviewID" value="<?php echo $review['ReviewID']; ?>">

                    <div class="form-group">
                        <label for="PropertyID">Property ID:</label>
                        <input type="number" class="form-control" name="PropertyID" value="<?php echo $review['PropertyID']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="UserID">User ID:</label>
                        <input type="number" class="form-control" name="UserID" value="<?php echo $review['UserID']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="Rating">Rating:</label>
                        <input type="number" step="0.1" class="form-control" name="Rating" value="<?php echo $review['Rating']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="Comment">Comment:</label>
                        <textarea class="form-control" name="Comment" required><?php echo $review['Comment']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="saveReview" value="Save">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=review&action=list'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>