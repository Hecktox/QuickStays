<!DOCTYPE html>
<html lang="en">
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Host Property</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            color: #ffffff;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gradient-form {
            padding: 20px;
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #ffffff;
            border-color: #ffffff;
            color: #4e54c8;
        }

        .btn-primary:hover {
            background-color: #8f94fb;
            border-color: #8f94fb;
            color: #ffffff;
        }

        .register-link {
            color: #ffffff !important;
            transition: color 0.3s ease-in-out;
        }

        .register-link:hover {
            color: #8f94fb !important;
            text-decoration: none;
        }

        .form-control {
            border-radius: 20px;
            color: #4e54c8;
        }

        .form-control::placeholder {
            color: #4e54c8;
        }
    </style>
    <script>
        function previewImage(input, previewId) {
            var preview = document.getElementById(previewId);
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="container h-100">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-md-10 offset-md-1">
                <h1 class="mb-4 text-center">Host Property</h1>
                <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=property&action=host"
                    class="form-group" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="PropertyName">Property Name:</label>
                            <input type="text" class="form-control" name="PropertyName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Country">Country:</label>
                            <input type="text" class="form-control" name="Country" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="City">City:</label>
                            <input type="text" class="form-control" name="City" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Province">Province:</label>
                            <input type="text" class="form-control" name="Province" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="StreetAddress">Street Address:</label>
                            <input type="text" class="form-control" name="StreetAddress" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Description">Description:</label>
                            <textarea class="form-control" name="Description" required></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="PropertyType">Property Type:</label>
                            <select class="form-control" name="PropertyType">
                                <option value="House">House</option>
                                <option value="Apartment">Apartment</option>
                                <option value="Condo">Condo</option>
                                <option value="Duplex">Duplex</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="NumRooms">Number of Rooms:</label>
                            <input type="number" class="form-control" name="NumRooms" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="NumBathrooms">Number of Bathrooms:</label>
                            <input type="number" class="form-control" name="NumBathrooms" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="AvailabilityDate">Availability Date:</label>
                            <input type="date" class="form-control" name="AvailabilityDate" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 offset-md-3">
                            <label for="PricePerNight">Price Per Night (CAD):</label>
                            <input type="number" step="0.01" class="form-control" name="PricePerNight" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Image1">First Image (Thumbnail):</label>
                            <input type="file" class="form-control" name="Image1" accept="image/*"
                                onchange="previewImage(this, 'previewImage1')">
                            <img id="previewImage1" src="#" alt="Preview Image"
                                style="display: none; max-width: 100%; margin-top: 10px;">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Image2">Second Image:</label>
                            <input type="file" class="form-control" name="Image2" accept="image/*"
                                onchange="previewImage(this, 'previewImage2')">
                            <img id="previewImage2" src="#" alt="Preview Image"
                                style="display: none; max-width: 100%; margin-top: 10px;">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Image3">Third Image:</label>
                            <input type="file" class="form-control" name="Image3" accept="image/*"
                                onchange="previewImage(this, 'previewImage3')">
                            <img id="previewImage3" src="#" alt="Preview Image"
                                style="display: none; max-width: 100%; margin-top: 10px;">
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary mx-auto" name="hostProperty" value="Host Property">
                        <button type="button" class="btn btn-primary mx-auto float-right"
                            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=user&action=index'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>