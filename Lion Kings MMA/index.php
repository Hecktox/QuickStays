<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lion Kings MMA</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
    <!-- Links -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8b75f0d2e8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
    <section class="header">
        <!-- Nav Bar Start -->
        <nav>
            <div class="nav-links" id="navLinks">
                <!-- <i class="fa fa-times" onclick="hideMenuBar()"></i> -->
                <ul>
                    <a href="index.php"> <img src="images/image.png" width="100"> </a>
                    <div class="list">
                        <li><a href="about.html">ABOUT</a></li>
                        <li><a href="contact.html">CONTACT</a></li>
                        <li><a href="class.html">CLASS</a></li>
                        <li><a href="cal.html">CALENDAR</a></li>
                        <li><a href="extra.html">BOOK NOW</a></li>
                        <li><a href="cart.html">CART</a></li>
                        <li><a href="login.html">ACCOUNT</a></li>
                        <?php
                        session_start(); // start the session
                        if(isset($_SESSION['user'])) {
                            echo "<li><a href='login.html'>".$_SESSION['user']."</a></li>"; // change button to user name
                        } else {
                            echo "<li><a href='login.html'>ACCOUNT</a></li>"; // default account button
                        }
                        ?>
                    </div>
                </ul>
            </div>
            <!-- <i class="fa fa-bars" onclick="showMenuBar()"></i> -->
        </nav>
        <!-- Nav Bar End -->
        <section class="header-titles">
            <h1 class="header-title">Welcome To Lion Kings MMA</h1>
            <h4 class="header-subtitle">Building Community, One Roll at a Time</h4>
        </section>
    </section>

    <section class="home-about">
        <div class="text-container">
            <h2>About Us</h2>
            <p>Welcome to our non-profit jiu-jitsu dojo! We're dedicated to providing a safe and inclusive space for
                people of all ages and backgrounds to learn the art of jiu-jitsu.
                Our mission is to help you build confidence, resilience, and community through the practice of
                jiu-jitsu.
            </p>
            <p>Our experienced and passionate instructors are committed to helping you achieve your goals, whether
                you're a complete beginner or an advanced student. We offer personalized training plans and a variety of
                classes designed to help you develop physical strength, flexibility, and endurance.
            </p>
            <a href="about.html" class="button">Learn More</a>
        </div>
        <div class="home-about-container">
            <img src="images/home-about.jpg" width="720" height="480">
        </div>
    </section>

    <section class="partner">
        <div class="containers">
            <img src="images/tablogo.png" alt="">
            <h3>Partner 1</h3>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor tortor at lectus euismod
                vestibulum. Fusce maximus felis ac congue pretium. Aenean semper orci eu urna varius commodo.</p>
            <a href="" class="button">Learn More</a>
        </div>
        <div class="containers">
            <img src="images/tablogo.png" alt="">
            <h3>Partner 2</h3>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor tortor at lectus euismod
                vestibulum. Fusce maximus felis ac congue pretium. Aenean semper orci eu urna varius commodo.</p>
            <a href="" class="button">Learn More</a>
        </div>
        <div class="containers">
            <img src="images/tablogo.png" alt="">
            <h3>Partner 3</h3>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor tortor at lectus euismod
                vestibulum. Fusce maximus felis ac congue pretium. Aenean semper orci eu urna varius commodo.</p>
            <a href="" class="button">Learn More</a>
        </div>
    </section>
    <div class="arrow-nav">
        <i class="fa-solid fa-caret-left fa-2xl" id="left-arrow"></i>
        <i class="fa-solid fa-caret-right fa-2xl" id="right-arrow"></i>
    </div>

    <script>
        document.getElementById("right-arrow").addEventListener("click", function () {
            const containers = document.getElementsByClassName("containers");
            const lastContainer = containers[containers.length - 1];
            const parent = lastContainer.parentNode;

            parent.insertBefore(lastContainer, containers[0]);
        });

        document.getElementById("left-arrow").addEventListener("click", function () {
            const containers = document.getElementsByClassName("containers");
            const firstContainer = containers[0];
            const parent = firstContainer.parentNode;

            parent.appendChild(firstContainer);
        });
    </script>

    <section class="home-class">
        <div class="home-class-container">
            <img src="images/home-header.jpg" width="720" height="480">
        </div>
        <div class="text-container">
            <h2>Classes</h2>
            <p>Welcome to our non-profit jiu-jitsu dojo! We're dedicated to providing a safe and inclusive space for
                people of all ages and backgrounds to learn the art of jiu-jitsu.
                Our mission is to help you build confidence, resilience, and community through the practice of
                jiu-jitsu.
            </p>
            <p>Our experienced and passionate instructors are committed to helping you achieve your goals, whether
                you're a complete beginner or an advanced student. We offer personalized training plans and a variety of
                classes designed to help you develop physical strength, flexibility, and endurance.
            </p>
            <a href="class.html" class="button">Get Started</a>
        </div>
    </section>

    <section class="inst">
        <div class="box" id="partner1">
            <img src="images/home-about.jpg" alt="">
            <h3>Partner 1</h3>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor tortor at lectus euismod
                vestibulum. Fusce maximus felis ac congue pretium. Aenean semper orci eu urna varius commodo.</p>
            <a href="" class="button">Learn More</a>
        </div>
        <div class="box hidden" id="partner2">
            <img src="images/home-about.jpg" alt="">
            <h3>Partner 2</h3>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor tortor at lectus euismod
                vestibulum. Fusce maximus felis ac congue pretium. Aenean semper orci eu urna varius commodo.</p>
            <a href="" class="button">Learn More</a>
        </div>
    </section>
    <div class="arrow-nav">
        <i class="fa-solid fa-caret-left fa-2xl" id="left"></i>
        <i class="fa-solid fa-caret-right fa-2xl" id="right"></i>
    </div>

    <script>
        let currentPartner = 1; // Track the currently displayed partner

        document.getElementById("right").addEventListener("click", function () {
            const partner1 = document.getElementById("partner1");
            const partner2 = document.getElementById("partner2");

            if (currentPartner === 1) {
                partner1.classList.add("hidden");
                partner2.classList.remove("hidden");
                currentPartner = 2;
            } else {
                partner2.classList.add("hidden");
                partner1.classList.remove("hidden");
                currentPartner = 1;
            }
        });

        document.getElementById("left").addEventListener("click", function () {
            const partner1 = document.getElementById("partner1");
            const partner2 = document.getElementById("partner2");

            if (currentPartner === 1) {
                partner1.classList.add("hidden");
                partner2.classList.remove("hidden");
                currentPartner = 2;
            } else {
                partner2.classList.add("hidden");
                partner1.classList.remove("hidden");
                currentPartner = 1;
            }
        });
    </script>

    <a href="#" class="top"><i class="fa-solid fa-arrow-up"></i></a>

    <footer>
        <div class="links">
            <a href="https://www.facebook.com/lionkingsmma"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/combat_st.lo/?hl=en"><i class="fa-brands fa-instagram"></i></a>
        </div>
    </footer>
</body>

</html>