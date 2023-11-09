<!--
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
-->

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Bootstrap JavaScript and its dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.5/umd.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Bootstrap Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">QuickStays</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Login <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-3">Login</h1>
        <form method="POST" action="/eCommerce-Project/QuickStays/index.php?entity=login&action=login">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
        <button type="button" class="btn btn-link"
            onclick="window.location.href='/eCommerce-Project/QuickStays/index.php?entity=user&action=register'">Not a
            Member? Register Here</button>
        <button class="btn btn-secondary" onclick="window.location.href='/eCommerce-Project/QuickStays'">Cancel</button>
    </div>
</body>

</html>