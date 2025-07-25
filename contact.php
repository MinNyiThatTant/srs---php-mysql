<?php

// Initialize the session
session_start();

// database connection
include('config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.13.1/font/bootstrap-icons.min.css"> -->

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" /> -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/favicon.png" />


</head>

<body>
    <nav>
        <a href="#" class="logo">
            <img src="images/logo.png" width="320px" />
        </a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn">
            <span class="nav-icon"></span>
        </label>
        <ul class="menu" style="border-radius: 5px;">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Departments</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">University-Info</a></li>
            <li><a href="#">Courses</a></li>


            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                <!-- Admin user is logged in -->
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <!-- Admin user is not logged in -->
                <li><a class="active" href="login.php" style="width:auto; border-radius: 5px; cursor: pointer;">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <!-- content -->
    <!-- <div class="container"> -->
    <section class="main mt-3" style="background-image: url(images/hero-bg.png);">
        <div class="container mt-3">
            <h1 class="text-center">Contact Us</h1>
            <div class="row g-4 mt-3">
                <!-- Contact Form -->
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Your full name" required />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" placeholder="Subject" />
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5"
                                placeholder="Write your message here..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-info"><i class="bi bi-envelope-fill"></i> Send
                            Message</button>
                    </form>


                </div>
                <!-- Google Map -->
                <div class="col-md-6">
                    <div class="map-responsive">

                        <iframe style="border-radius: 10px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3231.49693099441!2d96.00584617434232!3d16.86907098393232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1bf1c49ac518d%3A0xf20029d58b338b3a!2sWest%20Yangon%20Technological%20University%20(WYTU)%20We%20are%20CDM!5e1!3m2!1sen!2smm!4v1749147997524!5m2!1sen!2smm"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--footer------------->
    <footer>
        <p>Copyright (C) - <span id="year"></span> | Developed By <a href="#">e-Service (Group-1) </a> </p>
    </footer>
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        document.getElementById('year').textContent = new Date().getFullYear();
    </script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script> -->

</body>

</html>