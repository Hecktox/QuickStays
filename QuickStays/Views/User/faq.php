<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - QuickStays</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <style>
        .faq-header {
            margin: 20px 0;
        }
        .faq-body {
            margin-bottom: 10px;
        }
    </style>
    
    <script>
        $(document).ready(function(){
            $('.faq-question').click(function(){
                $(this).next('.faq-answer').slideToggle();
            });
        });
    </script>
</head>

<body>
<?php
    session_start();
    // Check if the user is logged in
    if (isset($_SESSION['user_email'])) {
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
        echo '  <a class="navbar-brand" href="/eCommerce-Project/QuickStays">QuickStays</a>';
        echo '  <div class="collapse navbar-collapse" id="navbarNav">';
        echo '    <ul class="navbar-nav ml-auto">';
        echo '      <li class="nav-item dropdown">';
        echo '        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        echo '          ' . htmlspecialchars($_SESSION['user_email']) . '';
        echo '        </a>';
        echo '        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=login&action=logout">Log out</a>';
        echo '        </div>';
        echo '      </li>';
        echo '    </ul>';
        echo '  </div>';
        echo '</nav>';
    } else {
        // User is not logged in, show the Login and Sign up links
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
        echo '  <a class="navbar-brand" href="/eCommerce-Project/QuickStays/Views/User/index.php">QuickStays</a>';
        echo '  <div class="collapse navbar-collapse" id="navbarNav">';
        echo '    <ul class="navbar-nav ml-auto">';
        echo '      <li class="nav-item dropdown">';
        echo '        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        echo '          Account';
        echo '        </a>';
        echo '        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=login&action=login">Login</a>';
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=user&action=register">Sign Up</a>';
        echo '          <a class="dropdown-item" href="/eCommerce-Project/QuickStays/index.php?entity=user&action=faq">FAQ</a>';
        echo '        </div>';
        echo '      </li>';
        echo '    </ul>';
        echo '  </div>';
        echo '</nav>';
    }
    ?>
    <div class="container mt-5">
        <h1 class="text-center">Frequently Asked Questions</h1>
        
        <div class="faq-section">
            <h2 class="faq-header">General Questions</h2>
            <div class="faq-body">
                <div class="faq-question">
                    <h3>How do I list my property?</h3>
                </div>
                <div class="faq-answer" style="display:none;">
                    <p>To list your property, simply click on the "Become A Host" button on the homepage and follow the instructions provided.</p>
                </div>
            </div>

            <div class="faq-body">
                <div class="faq-question">
                    <h3>How do I book a property?</h3>
                </div>
                <div class="faq-answer" style="display:none;">
                    <p>You can book a property by browsing the listings and clicking the "Book Now" button for the property you wish to stay at.</p>
                </div>
            </div>

            <div class="faq-body">
                <div class="faq-question">
                    <h3>How do I become a host?</h3>
                </div>
                <div class="faq-answer" style="display:none;">
                    <p>You can become a host by registered and selecting host when you do</p>
                </div>
            </div>


            
        </div>

        <div class="faq-section">
            <h2 class="faq-header">Payment Questions</h2>
            
        </div>

    

    </div>
</body>

</html>
