
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
                <h1 class="mb-4 text-center">Edit Property</h1>
                <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=property&action=edit" class="bg-white p-3 border rounded">
                    <input type="hidden" name="PropertyID" value="<?php echo $property['PropertyID']; ?>">

                    <div class="form-group">
                        <label for="PropertyName">Property Name:</label>
                        <input type="text" class="form-control" name="PropertyName" value="<?php echo $property['PropertyName']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="Country">Country:</label>
                        <input type="text" class="form-control" name="Country" value="<?php echo $property['Country']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="City">City:</label>
                        <input type="text" class="form-control" name="City" value="<?php echo $property['City']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="Province">Province:</label>
                        <input type="text" class="form-control" name="Province" value="<?php echo $property['Province']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="StreetAddress">Street Address:</label>
                        <input type="text" class="form-control" name="StreetAddress" value="<?php echo $property['StreetAddress']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="Description">Description:</label>
                        <textarea class="form-control" name="Description"><?php echo $property['Description']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="PropertyType">Property Type:</label>
                        <select class="form-control" name="PropertyType">
                            <option value="House" <?php if ($property['PropertyType'] === 'House') echo 'selected'; ?>>House</option>
                            <option value="Apartment" <?php if ($property['PropertyType'] === 'Apartment') echo 'selected'; ?>>Apartment</option>
                            <option value="Condo" <?php if ($property['PropertyType'] === 'Condo') echo 'selected'; ?>>Condo</option>
                            <option value="Duplex" <?php if ($property['PropertyType'] === 'Duplex') echo 'selected'; ?>>Duplex</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="NumRooms">Number of Rooms:</label>
                        <input type="number" class="form-control" name="NumRooms" value="<?php echo $property['NumRooms']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="NumBathrooms">Number of Bathrooms:</label>
                        <input type="number" class="form-control" name="NumBathrooms" value="<?php echo $property['NumBathrooms']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="AvailabilityDate">Availability Date:</label>
                        <input type="date" class="form-control" name="AvailabilityDate" value="<?php echo $property['AvailabilityDate']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="PricePerNight">Price Per Night (CAD):</label>
                        <input type="number" step="0.01" class="form-control" name="PricePerNight" required value="<?php echo $property['PricePerNight']; ?>">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="saveProperty" value="Save">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=property&action=list'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


</html>