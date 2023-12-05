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
                <h1 class="mb-4 text-center">Add Property</h1>
                <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=property&action=add" class="bg-white p-3 border rounded">
                    <div class="form-group">
                        <label for="PropertyName">Property Name:</label>
                        <input type="text" class="form-control" name="PropertyName" required>
                    </div>

                    <div class="form-group">
                        <label for="Country">Country:</label>
                        <input type="text" class="form-control" name="Country" required>
                    </div>

                    <div class="form-group">
                        <label for="City">City:</label>
                        <input type="text" class="form-control" name="City" required>
                    </div>

                    <div class="form-group">
                        <label for="Province">Province:</label>
                        <input type="text" class="form-control" name="Province" required>
                    </div>

                    <div class="form-group">
                        <label for="StreetAddress">Street Address:</label>
                        <input type="text" class="form-control" name="StreetAddress" required>
                    </div>

                    <div class="form-group">
                        <label for="Description">Description:</label>
                        <textarea class="form-control" name="Description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="PropertyType">Property Type:</label>
                        <select class="form-control" name="PropertyType">
                            <option value="House">House</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Condo">Condo</option>
                            <option value="Duplex">Duplex</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="NumRooms">Number of Rooms:</label>
                        <input type="number" class="form-control" name="NumRooms" required>
                    </div>

                    <div class="form-group">
                        <label for="NumBathrooms">Number of Bathrooms:</label>
                        <input type="number" class="form-control" name="NumBathrooms" required>
                    </div>

                    <div class="form-group">
                        <label for="AvailabilityDate">Availability Date:</label>
                        <input type="date" class="form-control" name="AvailabilityDate" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="addProperty" value="Add Property">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=property&action=list'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>